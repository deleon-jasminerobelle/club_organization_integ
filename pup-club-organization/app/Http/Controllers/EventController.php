<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use App\Models\Organization;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class EventController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required',
            'description' => 'required|string',
            // increase limit to 4MB to reduce silent drops from PHP upload limits
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        $start = $request->input('date') . ' ' . $request->input('time');

        // Ensure foreign keys exist (create defaults if missing)
        $userId = auth()->id();
        if (!$userId) {
            $existingUser = User::query()->first();
            if (!$existingUser) {
                $existingUser = User::create([
                    'name' => 'System User',
                    'email' => 'system@example.com',
                    'password' => bcrypt('password'),
                ]);
            }
            $userId = $existingUser->id;
        }

        $org = Organization::query()->first();
        if (!$org) {
            // Ensure there is at least one category for the FK constraint
            $category = Category::query()->first();
            if (!$category) {
                $category = Category::create([
                    'name' => 'General',
                    'slug' => 'general',
                    'description' => 'Auto-created category',
                ]);
            }

            $org = Organization::create([
                'name' => 'Default Organization',
                'slug' => 'default-organization',
                'description' => 'Auto-created organization for events.',
                'email' => 'org_' . time() . '@example.com',
                'category_id' => $category->id,
                'is_active' => true,
                'is_recognized' => true,
            ]);
        }

        // Handle featured image upload
        $featuredImagePath = null;
        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/events', $imageName);
            $featuredImagePath = 'storage/events/' . $imageName;
        }

        $event = Event::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'start_datetime' => $start,
            'end_datetime' => $start,
            'organization_id' => $org->id,
            'user_id' => $userId,
            'location' => 'Campus',
            'status' => 'scheduled',
            'type' => 'general',
            'is_public' => true,
            'featured_image' => $featuredImagePath,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Event saved successfully',
            'event' => $event,
        ]);
    }

    public function getUpcomingEvents()
    {
        $upcomingEvents = Event::whereDate('start_datetime', '>=', Carbon::today())
            ->where('is_public', true)
            ->where('status', 'scheduled')
            ->orderBy('start_datetime', 'asc')
            ->take(6)
            ->get()
            ->map(function ($event) {
                // Ensure frontend can rely on a valid URL for the image
                $event->featured_image = $event->featured_image_url ?? $event->featured_image;
                return $event;
            });

        return response()->json([
            'success' => true,
            'events' => $upcomingEvents,
        ]);
    }

    public function list()
    {
        $events = Event::orderBy('created_at', 'desc')
            ->take(20)
            ->get()
            ->map(function ($event) {
                $event->featured_image = $event->featured_image_url ?? $event->featured_image;
                return $event;
            });

        return response()->json([
            'success' => true,
            'events' => $events,
        ]);
    }

    public function update(Request $request, Event $event)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'sometimes|required|string|max:255',
            'date' => 'sometimes|required|date',
            'time' => 'sometimes|required',
            'description' => 'sometimes|required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:4096',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        if ($request->hasAny(['date', 'time'])) {
            $date = $request->input('date') ?? $event->start_datetime->format('Y-m-d');
            $time = $request->input('time') ?? $event->start_datetime->format('H:i');
            $event->start_datetime = $date . ' ' . $time;
            $event->end_datetime = $event->start_datetime;
        }

        if ($request->filled('title')) $event->title = $request->input('title');
        if ($request->filled('description')) $event->description = $request->input('description');

        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/events', $imageName);
            $event->featured_image = 'storage/events/' . $imageName;
        }

        $event->save();

        return response()->json([
            'success' => true,
            'message' => 'Event updated successfully',
            'event' => $event->fresh(),
        ]);
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return response()->json([
            'success' => true,
            'message' => 'Event deleted successfully',
        ]);
    }
}



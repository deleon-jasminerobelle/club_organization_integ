<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required',
            'description' => 'required|string',
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
            $org = Organization::create([
                'name' => 'Default Organization',
                'slug' => 'default-organization',
                'description' => 'Auto-created organization for events.',
                'is_active' => true,
                'is_recognized' => true,
            ]);
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
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Event saved successfully',
            'event' => $event,
        ]);
    }
}



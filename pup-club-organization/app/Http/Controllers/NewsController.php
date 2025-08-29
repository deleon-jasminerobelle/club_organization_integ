<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Event;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Pagination\LengthAwarePaginator;
use Carbon\Carbon;

class NewsController extends Controller
{
    /**
     * Display a listing of the news.
     */
    public function index(Request $request)
    {
        try {
            $query = News::with(['organization', 'user'])
                ->published()
                ->orderBy('published_at', 'desc');

            // Apply filters
            if ($request->has('organization') && $request->organization) {
                $query->where('organization_id', $request->organization);
            }

            if ($request->has('type') && $request->type) {
                $query->where('type', $request->type);
            }

            if ($request->has('search') && $request->search) {
                $search = $request->search;
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                      ->orWhere('content', 'like', "%{$search}%")
                      ->orWhere('excerpt', 'like', "%{$search}%");
                });
            }

            $news = $query->paginate(12);
            $latestNews = News::with(['organization'])
                ->published()
                ->orderBy('published_at', 'desc')
                ->take(3)
                ->get();
            $organizations = Organization::all();

            // Server-side events for initial render (fallback if JS fetch fails)
            $upcomingEvents = Event::whereDate('start_datetime', '>=', Carbon::today())
                ->where('is_public', true)
                ->where('status', 'scheduled')
                ->orderBy('start_datetime', 'asc')
                ->take(6)
                ->get();

            $recentEvents = Event::orderBy('created_at', 'desc')
                ->take(6)
                ->get();
        } catch (\Throwable $e) {
            // Graceful fallback if database is not reachable
            $news = new LengthAwarePaginator([], 0, 12, 1);
            $latestNews = collect([]);
            $organizations = collect([]);
            $upcomingEvents = collect([]);
            $recentEvents = collect([]);
        }

        return view('index', compact('news', 'organizations', 'latestNews', 'upcomingEvents', 'recentEvents'));
    }

    /**
     * Display a listing of the news for the news page.
     */
    public function newsList(Request $request)
    {
        try {
            $query = News::with(['organization', 'user'])
                ->published()
                ->orderBy('published_at', 'desc');

            // Apply filters
            if ($request->has('organization') && $request->organization) {
                $query->where('organization_id', $request->organization);
            }

            if ($request->has('type') && $request->type) {
                $query->where('type', $request->type);
            }

            if ($request->has('search') && $request->search) {
                $search = $request->search;
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                      ->orWhere('content', 'like', "%{$search}%")
                      ->orWhere('excerpt', 'like', "%{$search}%");
                });
            }

            $news = $query->paginate(12);
            $organizations = Organization::all();
        } catch (\Throwable $e) {
            // Create a mock paginator with empty data to maintain the expected interface
            $news = new LengthAwarePaginator([], 0, 12, 1);
            $organizations = collect([]);
        }

        return view('news', compact('news', 'organizations'));
    }

    /**
     * Store a newly created news in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'organization_id' => 'required|exists:organizations,id',
            'type' => 'required|in:announcement,news,event,general',
            'excerpt' => 'nullable|string|max:500',
            'featured_image' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $news = News::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . time(),
            'content' => $request->content,
            'excerpt' => $request->excerpt ?? Str::limit($request->content, 150),
            'organization_id' => $request->organization_id,
            'user_id' => auth()->id() ?? null, // Set to null if not authenticated and no default user exists
            'featured_image' => $request->featured_image,
            'type' => $request->type,
            'is_published' => true,
            'published_at' => now(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'News created successfully!',
            'news' => $news->load('organization')
        ]);
    }

    /**
     * Display the specified news.
     */
    public function show($slug)
    {
        $news = News::with(['organization', 'user'])
            ->where('slug', $slug)
            ->published()
            ->firstOrFail();

        $news->incrementViewCount();

        return view('news-detail', compact('news'));
    }

    /**
     * Get news by organization.
     */
    public function byOrganization($organizationId)
    {
        $news = News::with(['organization', 'user'])
            ->where('organization_id', $organizationId)
            ->published()
            ->orderBy('published_at', 'desc')
            ->get();

        return response()->json($news);
    }

    /**
     * Get news by type.
     */
    public function byType($type)
    {
        $news = News::with(['organization', 'user'])
            ->ofType($type)
            ->published()
            ->orderBy('published_at', 'desc')
            ->get();

        return response()->json($news);
    }

    /**
     * Increment view count for a news item.
     */
    public function incrementViews($id)
    {
        $news = News::findOrFail($id);
        $news->incrementViewCount();

        return response()->json(['views' => $news->view_count]);
    }
}

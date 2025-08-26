<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\MediaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [NewsController::class, 'index']);

Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/signup', function () {
    return view('signup');
});

// API test route for debugging
Route::get('/api-test', [AuthController::class, 'testApiConnection']);

// Route for index page - using NewsController
Route::get('/index', [NewsController::class, 'index']);

// New route for gallery page
Route::get('/gallery', function () {
    $media = \App\Models\Media::where('collection', 'gallery')
        ->orderBy('order_column')
        ->get();
    return view('gallery', ['media' => $media]);
})->name('gallery');

Route::get('/club', function() {
    return view('club');
});

// Media routes
Route::get('/media/create', [MediaController::class, 'create'])->name('media.create');
Route::post('/media', [MediaController::class, 'store'])->name('media.store');

// News routes
Route::get('/news', [NewsController::class, 'newsList']);
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');

// Test route for media creation
Route::get('/test-media', function () {
    try {
        // Temporarily disable foreign key checks
        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        $mediaData = [
            'filename' => 'test_image.jpg',
            'original_filename' => 'test_image.jpg',
            'mime_type' => 'image/jpeg',
            'file_size' => 12345,
            'file_path' => 'storage/media/test_image.jpg',
            'title' => 'Test Image',
            'description' => 'This is a test image.',
            'alt_text' => 'Test Image',
            'type' => 'image',
            'collection' => 'gallery',
            'organization_id' => 2, // Using organization ID 2
            'user_id' => null, // Testing with null user_id
        ];

        $media = \App\Models\Media::create($mediaData);
        
        // Re-enable foreign key checks
        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        return response()->json(['success' => true, 'media' => $media]);
    } catch (\Exception $e) {
        // Re-enable foreign key checks in case of error
        \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        return response()->json(['success' => false, 'error' => $e->getMessage()]);
    }
});


// Route for events page
Route::get('/events', function ()  {
    return view('events');
});
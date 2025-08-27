<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NewsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Public API: Upcoming events for index page
Route::get('/events/upcoming', [EventController::class, 'getUpcomingEvents']);

// New route for signup
Route::post('/students', [AuthController::class, 'signup']);

// News API routes
Route::post('/news', [NewsController::class, 'store']);
Route::get('/news/organization/{organizationId}', [NewsController::class, 'byOrganization']);
Route::get('/news/type/{type}', [NewsController::class, 'byType']);
Route::post('/news/{id}/views', [NewsController::class, 'incrementViews']);

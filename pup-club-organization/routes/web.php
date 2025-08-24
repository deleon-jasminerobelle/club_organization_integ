<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/signup', function () {
    return view('signup');
});

// API test route for debugging
Route::get('/api-test', [AuthController::class, 'testApiConnection']);

// New route for index page
Route::get('/index', function () {
    return view('index');
});

// New route for gallery page
Route::get('/gallery', function () {
    return view('gallery');
});

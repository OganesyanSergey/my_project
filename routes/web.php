<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

// User

Route::prefix('/')->middleware('check_banned')->group(function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/store', [App\Http\Controllers\PostController::class, 'store'])->name('add_post');
    Route::post('/home', [App\Http\Controllers\CommentController::class, 'store'])->name('add_comment');

    Route::get('/profile', [App\Http\Controllers\UserController::class, 'index'])->name('profile');
    Route::post('/profile', [App\Http\Controllers\UserController::class, 'update'])->name('update_profile');

});

// Admin

Route::prefix('admin')->middleware('auth')->group(function() {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('admin_panel');
    Route::get('/users', [App\Http\Controllers\AdminController::class, 'show_users'])->name('show_users');
    Route::post('/users', [App\Http\Controllers\AdminController::class, 'status_users'])->name('status_users');

});




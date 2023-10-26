<?php

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

Route::get('/', \App\Http\Controllers\Front\HomeController::class)->name('home');

Route::controller(\App\Http\Controllers\Front\PostController::class)->group(function () {
    Route::get('/posts', 'index')->name('posts.index');
    Route::get('/posts/{post}', 'show')->name('posts.show');
});

Route::group(['middleware' => 'guest', 'as' => 'auth.'], function() {
    Route::get('/signin', [\App\Http\Controllers\Front\AuthController::class, 'signinForm'])->name('signin');
    Route::post('/signin', [\App\Http\Controllers\Front\AuthController::class, 'signinAction'])->name('signin.action');

    Route::get('/signup', [\App\Http\Controllers\Front\AuthController::class, 'signupForm'])->name('signup');
    Route::post('/signup', [\App\Http\Controllers\Front\AuthController::class, 'signupAction'])->name('signup.action');
});

Route::middleware('auth')->group(function() {
    Route::get('/signout', [\App\Http\Controllers\Front\AuthController::class, 'signout'])->name('auth.signout');

    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('/', \App\Http\Controllers\Admin\HomeController::class)->name('home');
        Route::resource('posts', \App\Http\Controllers\Admin\PostController::class);
        Route::resource('tags', \App\Http\Controllers\Admin\TagController::class);
        Route::resource('users', App\Http\Controllers\Admin\UserController::class);
    });
});

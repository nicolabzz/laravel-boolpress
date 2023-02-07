<?php

use Illuminate\Support\Facades\Auth;
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

// frontoffice
Route::get('/', 'Guest\PageController@home')->name('guest.home');
Route::get('/posts', 'Guest\PostController@index')->name('guest.posts.index');
Route::get('/posts/{post}', 'Guest\PostController@show')->name('guest.posts.show');

Auth::routes();

// backoffice
Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', 'PageController@dashboard')->name('dashboard');
        Route::resource('posts', 'PostController')->except(['show']);
    });

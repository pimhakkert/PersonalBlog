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

Route::get('/', 'PostController@index')->name('home');

Route::get('/post/{slug}', 'PostController@view')->name('post_view');

//Admin
Route::get('/admin', 'AdminController@index')->name('admin.home')->middleware('auth');

Route::get('/admin/new', 'AdminController@new')->name('admin.new')->middleware('auth');
Route::post('/admin/new', 'AdminController@storeNew')->name('admin.new')->middleware('auth');

Route::get('/admin/edit/{slug}', 'AdminController@new')->name('admin.new')->middleware('auth');
Route::post('/admin/edit/{slug}', 'AdminController@storeNew')->name('admin.new')->middleware('auth');

Route::get('/admin/logout', 'AdminController@logout')->name('admin.logout')->middleware('auth');

//Authentication
Auth::routes(['register' => false]);

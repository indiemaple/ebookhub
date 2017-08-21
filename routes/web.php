<?php

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

Route::get('/', 'PagesController@home');

Route::post('/users/store', 'UsersController@store')->name('users.store');
Route::get('/users/edit', 'UsersController@edit')->name('users.edit');
Route::get('/users/show', 'UsersController@show')->name('users.show');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

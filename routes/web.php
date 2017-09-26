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

#  auth
Auth::routes();
Route::get('logout','Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

# ----------------- Book ---------------------
Route::get('/books', 'BooksController@index')->name('books.index');
Route::get('/books/create', 'BooksController@create')->name('books.create');
Route::post('/books/store', 'BooksController@store')->name('books.store');
Route::get('/books/{id}', 'BooksController@show')->name('books.show');
Route::post('upload_image', 'BooksController@uploadImage')->name('upload_image')->middleware('auth');
Route::get('/books/{id}/edit', 'BooksController@edit')->name('books.edit');
Route::patch('/books/{id}/update', 'BooksController@update')->name('books.update');
Route::get('/books/{id}/book_source', 'BooksController@bookSource')->name('books.bookSource');
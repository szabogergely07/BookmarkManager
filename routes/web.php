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

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/bookmarks', 'BookmarksController@index')->name('bookmarks.index');

Route::get('/bookmark/edit/{id}', 'BookmarksController@edit');

Route::post('/bookmarks/store', 'BookmarksController@store')->name('bookmarks.store');

Route::put('/bookmark/update/{id}', 'BookmarksController@update');

Route::delete('/bookmark/delete/{id}', 'BookmarksController@destroy');


Route::get('/redirect', 'Auth\LoginController@redirectToProvider')->name('social.redirect');
Route::get('/callback', 'Auth\LoginController@handleProviderCallback');
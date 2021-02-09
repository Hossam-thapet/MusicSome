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





Auth::routes();

Route::get('/home', 'CollectionController@index')->name('home');
Route::resource('/songs','SongController');
Route::get('/find','SearchController@search');
Route::get('/addcollection/{id}','CollectionController@addSong');
Route::get('/top_votes','SelectController@selectamr');
Route::get('/linkin_park','SelectController@selectlinkin');
Route::delete('/collection-delete/{id}','CollectionController@deletesong');
Route::get('/exo','SelectController@selectexo');
Route::get('/bts','SelectController@selectbts');
Route::get('/all','SelectController@selectall');
Route::get('/vote/{id}','VoteController@Vote');

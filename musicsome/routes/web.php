<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});





Auth::routes();

Route::get('/home', 'CollectionController@index')->name('home');
Route::resource('/songs','SongController');
Route::get('/find','SearchController@search');
Route::get('/addcollection/{id}','CollectionController@addSong');
Route::get('/category','SelectController@Category');
Route::get('/top_votes','SelectController@selectamr');
Route::get('/recent','SelectController@selectrecent');
Route::delete('/collection-delete/{id}','CollectionController@deletesong');
Route::get('/vote/{id}','VoteController@Vote');

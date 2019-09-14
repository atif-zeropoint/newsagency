<?php

Route::get('/', function() {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function(){
    Route::post('stories/{story}/comments', 'StoryCommentsController@store');
    Route::get('stories/create', 'StoriesController@create');
    Route::post('stories', 'StoriesController@store');
    Route::patch('stories/{story}', 'StoriesController@update');
    Route::delete('stories/{story}', 'StoriesController@destroy');
});



Route::get('stories', 'StoriesController@index');
Route::get('stories/{story}', 'StoriesController@show');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

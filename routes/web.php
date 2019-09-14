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

Route::get('/', function() {
    return redirect('stories');
});

Route::group(['middleware' => 'auth'], function(){
    Route::post('stories', 'StoriesController@store');
    Route::patch('stories/{story}', 'StoriesController@update');
    Route::delete('stories/{story}', 'StoriesController@destroy');
});

Route::get('stories', 'StoriesController@index');
Route::get('stories/{story}', 'StoriesController@show');

Route::post('stories/{story}/comments', 'StoryCommentsController@store');

Auth::routes();

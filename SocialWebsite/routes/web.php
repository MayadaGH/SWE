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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

//<<<<<<< HEAD
// Route::get('/home', 'HomeController@ReadPost')->name('home');
// Route::get('/CreatePost','HomeController@CreatePost');
// Route::Post('/CreatePost','HomeController@CreatePost');

// Routes for PageController
//Route::resources('pages', 'Page\PageController');
Route::get('/pages', 'Page\PageController@index');
Route::get('/pages/create', 'Page\PageController@create');
Route::post('/pages', 'Page\PageController@store');
Route::get('pages/{page}', 'Page\PageController@show');
Route::get('pages/{page}/edit', 'Page\PageController@edit');
Route::patch('pages/{page}', 'Page\PageController@update');
Route::delete('pages/{page}', 'Page\PageController@destroy');
//=======
Route::get('/home', 'HomePostController@index')->name('home');
Route::get('/CreatePost','HomePostController@create')->name('home-post.create');

Route::post('/CreatePost','HomePostController@store')->name('home-post.store');

Route::post('/home','HomeLikeController@store')->name('like');
//>>>>>>> 88925d1b87c6c96fa0fb338fbb1d0cbe9e3a7972

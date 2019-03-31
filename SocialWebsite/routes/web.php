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
Route::resource('page', 'Page\PageController');
// Route::get('/pages', 'Page\PageController@index');
// Route::get('/pages/create', 'Page\PageController@create');
// Route::post('/pages', 'Page\PageController@store')->name('pages');
// Route::get('pages/{page}', 'Page\PageController@show');
// Route::get('pages/{page}/edit', 'Page\PageController@edit');
// Route::patch('pages/{page}', 'Page\PageController@update');
// Route::delete('pages/{page}', 'Page\PageController@destroy');
//=======
Route::get('/home', 'HomePostController@index')->name('home');

Route::get('/CreatePost','HomePostController@create')->name('home-post.create');
Route::post('/CreatePost','HomePostController@store')->name('home-post.store');
Route::post('/DeletePost','HomePostController@delete')->name('home-post.delete');
Route::post('/showPost','HomePostController@show')->name('home-post.show');
Route::post('/EditPost','HomePostController@edit')->name('home-post.edit');

Route::post('/home','HomeLikeController@store')->name('like');

//>>>>>>> 88925d1b87c6c96fa0fb338fbb1d0cbe9e3a7972

//Routes For Profile Controller
//Route::get('/profile/settings','Profile\ProfileSettingController@updateprofile');
Route::get('/profile/settings','Profile\ProfileSettingController@index')->name("Restore-View-Settings-Data");//this show the settings view and send user data to the profile settings view 
Route::get('/profile','Profile\ProfileController@index')->name('restore-profile-data');//this route call function to bring auth user data
Route::get('/profile/profile/{id}','Profile\ProfileController@GetOthersProfile')->name('user-profile-data'); //this route to bring another user data and show it in profile data 
Route::post('/profile/settings','Profile\ProfileSettingController@updateprofile')->name('update-profile-data');//send new data from profile settings view to 
//Search Route
Route::get('/search','searchController@getResults')->name('search.results');
//get user profile
Route::get('/user/{name}','Profile\profileController@getProfile')->name('profile.index');

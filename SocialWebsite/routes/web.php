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



Route::resource('page', 'Page\PageController');
Route::resource('pagePost', 'Page\PagePostController');


Route::get('/home', 'HomePostController@index')->name('home');
Route::get('/post/{id}','SinglePostController@index')->name('home-posts.single');
Route::get('/CreatePost','HomePostController@create')->name('home-post.create');
Route::post('/CreatePost','HomePostController@store')->name('home-post.store');
Route::post('/DeletePost','HomePostController@delete')->name('home-post.delete');
Route::post('/showPost','HomePostController@show')->name('home-post.show');
Route::post('/EditPost','HomePostController@edit')->name('home-post.edit');

Route::post('/home','HomeLikeController@store')->name('like');



//Routes For Profile Controller

Route::get('/profile/settings','Profile\ProfileController@index');

// Routes for Friends Managing Controller
Route::resource('/user-friend', 'UserFriendController')->except(['edit']);

//Route::get('/profile/settings','Profile\ProfileSettingController@updateprofile');
////<<<<<<< HEAD
Route::get('/profile/settings','Profile\ProfileSettingController@index')->name("Restore-View-Settings-Data");//this show the settings view and send user data to the profile settings view 
Route::get('/profile','Profile\ProfileController@index')->name('restore-profile-data');//this route call function to bring auth user data
Route::get('/profile/{id}','Profile\OtherUsersProfileController@index')->name('user-profile-data'); //this route to bring another user data and show it in profile data 
Route::post('/profile/settings','Profile\ProfileSettingController@updateprofile')->name('update-profile-data');//send new data from profile settings view to 
//Search Route
Route::get('/search','searchController@getResults')->name('search.results');
//get user profile
Route::get('/user/{name}','Profile\profileController@getProfile')->name('profile.index');

Route::get('/admin','HomeAdminController@index')->name('admin.dashboard');
Route::get('/usertable','UserTableController@index')->name('users-table');
Route::post('/delete_user','UserTableController@delete')->name('user-table.delete');
Route::post('/delete_admin','AdminTableController@delete')->name('admin-table.delete');

Route::post('/edit_profile/{id}','UserTableController@show')->name('user-table.edit');
Route::post('/edit_profileAdmin/{id}','AdminTableController@show')->name('admin-table.edit');

Route::post('/edit_user_profile/{id}','UserTableController@edit')->name('usertable-edituser');
Route::POST('/edit_user_profile/{id}','AdminTableController@edit')->name('admintable-edituser');


Route::get('/addadmin','HomeAdminController@show')->name('show_admin_form');
Route::post('/addadmin','HomeAdminController@add')->name('add_admin');
Route::get('/admintable','AdminTableController@index')->name('admins-table');
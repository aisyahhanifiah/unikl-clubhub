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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

	Route::resource('club', 'ClubController');

	Route::resource('myclub', 'UserClubController');
	Route::post('myclub', 'UserClubController@join')->name('myclub.join');

	Route::resource('event', 'EventController');

	Route::resource('myevent', 'UserEventController');
	Route::post('myevent', 'UserEventController@join')->name('myevent.join');

	Route::resource('mymeeting', 'UserMeetingController');

	Route::resource('admin/club', 'AdminClubController', ['as'=>'admin']);
	Route::resource('admin/club/member', 'AdminClubMemberController', ['as'=>'admin.club']);
	Route::resource('admin/event', 'AdminEventController', ['as'=>'admin']);
	Route::resource('admin/event/member', 'AdminEventMemberController', ['as'=>'admin.event']);
	Route::resource('admin/user', 'AdminUserController', ['as'=>'admin']);


	Route::resource('committee/club', 'CommitteeClubController', ['as'=>'committee']);
	Route::resource('committee/club/member', 'CommitteeClubMemberController', ['as'=>'committee.club']);
	Route::resource('committee/event', 'CommitteeEventController', ['as'=>'committee']);
	Route::resource('committee/event/member', 'CommitteeEventMemberController', ['as'=>'committee.event']);
});


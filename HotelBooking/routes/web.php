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

Route::get('/', [
	'as'=>'home',
	'uses'=>'PageController@getIndex'
]);

Route::get('home', [
	'as'=>'home',
	'uses'=>'PageController@getIndex'
]);

Route::get('rooms', [
	'as'=>'rooms',
	'uses'=>'PageController@getRooms'
]);

Route::get('about', [
	'as'=>'about',
	'uses'=>'PageController@getAbout'
]);


Route::get('myaccount',[
	'as'=>'myaccount',
	'uses'=>'PageController@getMyAccount'
]);

Route::post('myaccount',[
	'as'=>'myaccount',
	'uses'=>'PageController@postMyAccount'
]);

Route::post('myaccount/change-password',[
	'as'=>'change-password',
	'uses'=>'PageController@changePassword'
]);

route::get('guestbooking', [
	'as'=>'guestbooking',
	'uses'=>'PageController@getGuestBooking'
]);

Auth::routes();

route::get('booking',[
	'as'=>'booking',
	'uses'=>'PageController@getBooking'
]);
route::post('booking', [
	'as'=>'booking',
	'uses'=>'PageController@postBooking'
]);

Route::get('/booking/add_room',[
	'as'=>'add_room.action',
	'uses'=>'PageController@addRoom'
]);

Route::get('/booking/remove_room',[
	'as'=>'remove_room.action',
	'uses'=>'PageController@removeRoom'
]);

Route::get('admin',[
	'as'=>'admin',
	'uses'=>'PageController@getAdmin'
]);

Route::get('admin/{id}',[
	'as'=>'check-in',
	'uses'=>'PageController@getCheckin'
]);

Route::get('manager-room',[
	'as'=>'manager-room',
	'uses'=>'PageController@getManagerRoom'
]);
Route::get('cancel-reservation/{id}',[
	'as'=>'cancel-res',
	'uses'=>'PageController@cancelReservation'
]);

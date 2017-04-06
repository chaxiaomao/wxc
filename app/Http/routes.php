<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::any('/','ShopController@index');
Route::get('/goods/{gid}','ShopController@goods');
Route::get('/buy/{gid}','ShopController@buy');
Route::get('/cart','ShopController@cart');
Route::get('/personal','ShopController@personal');

Route::get('personal/revise','ShopController@revise');
Route::get('personal/myorders','ShopController@myorders');
Route::get('personal/deleteOrdsn','ShopController@deleteOrdsn');
Route::get('personal/myAddress','ShopController@myAddress');
Route::get('personal/deleteAddress','ShopController@deleteAddress');

Route::get('/playItem','ShopController@playItem');
Route::post('/done','ShopController@done');
Route::post('/pay','ShopController@pay');
Route::post('/payok','ShopController@payok');

Route::get('/cleanItem','ShopController@cleanItem');
Route::get('/addAddress','ShopController@addAddress');

Route::any('wx','WxController@index');
Route::get('login','UserController@login');
Route::get('logout','UserController@logout');
Route::get('index','UserController@index');

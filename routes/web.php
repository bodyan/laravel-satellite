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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');

//Satellites
Route::get('/satellite/add', 'SatelliteController@create')->name('satellite.add');
Route::post('/satellite/add', 'SatelliteController@store')->name('satellite.store');
Route::get('/satellite/{satellite}/edit', 'SatelliteController@edit')->name('satellite.edit');
Route::put('/satellite/edit', 'SatelliteController@update')->name('satellite.update');
Route::get('/satellite/{satellite}/delete', 'SatelliteController@destroy')->name('satellite.delete');
Route::get('/satellite/{satellite}', 'SatelliteController@show')->name('satellite.show');

//Transponders
Route::post('/transponder/create', 'TrasnponderController@create')->name('transponder.create');
Route::put('/transponder/{id}/update', 'TrasnponderController@update')->name('transponder.update');
Route::post('/transponder/{id}/delete', 'TrasnponderController@delete')->name('transponder.delete');
Route::get('/transponder/{id}', 'TrasnponderController@show')->name('transponder.show');

//Channels
Route::post('/channel/create', 'ChannelController@create')->name('channel.create');
Route::put('/channel/{id}/update', 'ChannelController@update')->name('channel.update');
Route::post('/channel/{id}/delete', 'ChannelController@delete')->name('channel.delete');
Route::get('/channel/{id}', 'ChannelController@show')->name('channel.show');

//XML Import
Route::get('/import', 'ImportXMLController@index')->name('import');
Route::post('/import', 'ImportXMLController@store')->name('import.store');

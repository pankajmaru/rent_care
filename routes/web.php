<?php

use Illuminate\Support\Facades\Route;

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

   Route::get('/', 'HomeController@index')->name('home');
   
   Route::group(['prefix'=>'tenant'], function(){
      Route::get('/', 'UsersController@home')->name('dashboard');
      Route::get('index', 'UsersController@index')->name('tenant-index');
      Route::post('store', 'UsersController@store')->name('tenant-store');
      Route::get('create', 'UsersController@create')->name('tenant-create');
      Route::get('show/{id}', 'UsersController@show')->name('tenant-show');
      Route::get('edit/{id}', 'UsersController@edit')->name('tenant-edit');
      Route::any('update/{id}','UsersController@update')->name('tenant-update');
      Route::any('delete/{id}', 'UsersController@destroy')->name('tenant-delete');   
   });

   
   Route::group(['prefix'=>'room'], function(){
      Route::any('add', 'RoomsController@create')->name('room-add');
      Route::any('edit/{id}', 'RoomsController@edit')->name('room-edit');
      Route::any('store', 'RoomsController@store')->name('room-store');
      Route::any('index', 'RoomsController@index')->name('room-index');
      Route::any('delete/{id}', 'RoomsController@destroy')->name('room-delete');   
   });

   Route::group(['prefix'=>'bill'], function(){
      Route::any('create','BillsController@create')->name('bill-create');
      Route::any('index','BillsController@index')->name('bill-index');
      Route::any('store','BillsController@store')->name('bill-store');
   });


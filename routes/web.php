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

   Route::group(['middleware' => ['auth','isadmin']], function() {
      Route::get('/', 'UsersController@home')->name('dashboard');
   
   Route::group(['prefix'=>'admin'], function(){
      Route::get('profile', 'AdminController@show')->name('admin-profile');
      Route::get('edit-profile/{id}', 'AdminController@edit')->name('edit-admin-profile');
      Route::post('update-profile/{id}', 'AdminController@update')->name('update-admin-profile');
   });  

   Route::group(['prefix'=>'bill'], function(){
      Route::any('index','BillsController@index')->name('bill-index');
      Route::any('store','BillsController@store')->name('bill-store');
      Route::any('create','BillsController@create')->name('bill-create');
      Route::any('show/{id}','BillsController@show')->name('bill-view');
      Route::any('edit/{id}','BillsController@edit')->name('bill-edit');
      Route::any('update/{id}','BillsController@update')->name('bill-update');
      Route::any('delete/{id}','BillsController@destroy')->name('bill-delete');
      Route::get('mail/send/{id}', 'BillsController@send')->name('bill-mail-send');
      Route::get('pdf/generate/{id}', 'BillsController@pdf')->name('bill-pdf-generate');
      
   }); 
   
   Route::group(['prefix'=>'landlord'], function(){
      Route::get('expenses-create', 'LandlordController@create')->name('add-landlord-expenses');
      Route::get('expenses-store', 'LandlordController@store')->name('store-landlord-expenses');
   });  

   Route::group(['prefix'=>'tenant'], function(){
      Route::get('index', 'UsersController@index')->name('tenant-index');
      Route::post('store', 'UsersController@store')->name('tenant-store');
      Route::get('create', 'UsersController@create')->name('tenant-create');
      Route::get('show/{id}', 'UsersController@show')->name('tenant-show');
      Route::get('edit/{id}', 'UsersController@edit')->name('tenant-edit');
      Route::post('update/{id}','UsersController@update')->name('tenant-update');
      Route::any('delete/{id}', 'UsersController@destroy')->name('tenant-delete');
   });

   Route::group(['prefix'=>'room'], function(){
      Route::any('index', 'RoomsController@index')->name('room-index');
      Route::any('store', 'RoomsController@store')->name('room-store');
      Route::any('create', 'RoomsController@create')->name('room-create');
      Route::any('edit/{id}', 'RoomsController@edit')->name('room-edit');
      Route::any('update/{id}','RoomsController@update')->name('room-update');
      Route::any('delete/{id}', 'RoomsController@destroy')->name('room-delete');
   });

  

   Route::group(['prefix'=>'tenant-image'], function(){
      Route::get('show','ImageController@show')->name('tenant-image-show');
      Route::get('index','ImageController@index')->name('tenant-image-index');
      Route::get('create','ImageController@create')->name('tenant-image-create');
      Route::post('store','ImageController@store')->name('tenant-image-store');
      Route::post('edit/{id}','ImageController@edit')->name('tenant-image-edit');
      Route::delete('delete/{id}','ImageController@destroy')->name('tenant-image-delete');
   });
});
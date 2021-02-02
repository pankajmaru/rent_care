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

   Auth::routes(['verify' => true]);

   Route::get('/home', 'HomeController@index')->name('home');

      Route::group(['middleware' => ['auth','isadmin']], function() {
         Route::get('/', 'UsersController@home')->name('dashboard');

      Route::group(['prefix'=>'admin'], function(){
         Route::get('profile', 'AdminController@show')->name('admin-profile');
         Route::get('edit-profile/{id}', 'AdminController@edit')->name('edit-admin-profile');
         Route::post('update-profile/{id}', 'AdminController@update')->name('update-admin-profile');
      });

      Route::group(['prefix'=>'bill'], function(){
         Route::get('index','BillsController@index')->name('bill-index');
         Route::post('store','BillsController@store')->name('bill-store');
         Route::get('create','BillsController@create')->name('bill-create');
         Route::get('show/{id}','BillsController@show')->name('bill-view');
         Route::get('edit/{id}','BillsController@edit')->name('bill-edit');
         Route::post('update/{id}','BillsController@update')->name('bill-update');
         Route::get('delete/{id}','BillsController@destroy')->name('bill-delete');
         Route::get('mail/send/{id}', 'BillsController@send')->name('bill-mail-send');
         Route::get('pdf/generate/{id}', 'BillsController@pdf')->name('bill-pdf-generate');
      });

      Route::group(['prefix'=>'landlord'], function(){
         Route::get('expenses-index', 'LandlordController@index')->name('index-landlord-expenses');
         Route::get('expenses-store', 'LandlordController@store')->name('store-landlord-expenses');
         Route::get('expenses-create', 'LandlordController@create')->name('create-landlord-expenses');
         Route::get('expenses-edit/{id}', 'LandlordController@edit')->name('edit-landlord-expenses');
         Route::get('expenses-update/{id}', 'LandlordController@update')->name('update-landlord-expenses');
         Route::get('expenses-delete/{id}', 'LandlordController@destroy')->name('delete-landlord-expenses');
      });

      Route::group(['prefix'=>'tenant'], function(){
         Route::get('index', 'UsersController@index')->name('tenant-index');
         Route::post('store', 'UsersController@store')->name('tenant-store');
         Route::get('create', 'UsersController@create')->name('tenant-create');
         Route::get('show/{id}', 'UsersController@show')->name('tenant-show');
         Route::get('edit/{id}', 'UsersController@edit')->name('tenant-edit');
         Route::post('update/{id}','UsersController@update')->name('tenant-update');
         Route::get('delete/{id}', 'UsersController@destroy')->name('tenant-delete');
      });

      Route::group(['prefix'=>'room'], function(){
         Route::get('index', 'RoomsController@index')->name('room-index');
         Route::get('store', 'RoomsController@store')->name('room-store');
         Route::get('create', 'RoomsController@create')->name('room-create');
         Route::get('edit/{id}', 'RoomsController@edit')->name('room-edit');
         Route::get('update/{id}','RoomsController@update')->name('room-update');
         Route::get('delete/{id}', 'RoomsController@destroy')->name('room-delete');
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
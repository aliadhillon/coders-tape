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

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/about', 'WelcomeController@about')->name('about');

Route::get('/services', 'ServiceController@index')->name('services.index');
Route::post('/services', 'ServiceController@store')->name('services.store');

Route::prefix('customers')->as('customers.')->group(function(){

    Route::get('/', 'CustomerController@index')->name('index');
    Route::get('/create', 'CustomerController@create')->name('create');
    Route::post('/', 'CustomerController@store')->name('store');
    Route::get('/{customer}', 'CustomerController@show')->name('show');
    Route::get('/{customer}/edit', 'CustomerController@edit')->name('edit');
    Route::patch('/{customer}', 'CustomerController@update')->name('update');
    Route::delete('/{customer}', 'CustomerController@destroy')->name('destroy');
});

Route::prefix('deleted-customers')->as('deleted-customers.')->group(function(){
    Route::get('/', 'DeletedCustomersController@index')->name('index');
    Route::get('/{id}', 'DeletedCustomersController@show')->name('show');
    Route::post('/{id}', 'DeletedCustomersController@restore')->name('restore');
    Route::delete('/{id}', 'DeletedCustomersController@forceDelete')->name('force-delete');
});

Route::get('/logs', 'LogController')->name('logs');

Route::get('/download/{photo}', 'DownloadController@customerImage')->name('download');

// Route::fallback(function(){
//     return redirect('/');
// });

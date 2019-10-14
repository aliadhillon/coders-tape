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
});

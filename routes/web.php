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
Route::view('/','auth.login')->middleware('guest');

Route::group(['prefix' => '/','namespace' => 'Dashboard','middleware' => 'auth'] , function(){
    Route::get('dashboard','TicketController@index')->name('dashboard');
    Route::resource('admins','AdminController')->except('show')->middleware('role:super_admin');
    Route::resource('tickets','TicketController')->except('show');
});


Auth::routes(['register' => false]);


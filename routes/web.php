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

Route::view('/', 'search')->name('search');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('staff/{staff:code}', 'AdminController@staff')->name('staff');


//record
Route::get('search', 'StaffController@search')->name('search');
Route::post('check-in/{staff:code}', 'RecordController@checkIn')->name('check.in');
Route::post('check-out/{staff:code}', 'RecordController@checkOut')->name('check.out');

Route::get('records/export/{staff?}', 'AdminController@export')->name('export');

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

Route::get('/','MainController@count');
Route::get('/guide', 'Guide@guide_count');

Route::get('/user', 'MainController@count');
Route::get('/support', 'Support@SUpport_count'| 'Support@support')->name('support');
Route::post('/support/check','Support@SUpport_count'| 'Support@support_check');

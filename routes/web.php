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

Route::get('/', 'MainController@countEmp');
Route::get('/showInfo','MainController@showInfo');
Route::get('/show','MainController@employees');
Route::get('personalInf/{emp_no}','MainController@showPersonalInfo');
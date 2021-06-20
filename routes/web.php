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

Route::get('/', 'OrderController@index');

Route::resource('courses', CourseController::class);
Route::resource('system_variables', SystemVariableController::class);
Route::resource('user_variables', UserVariableController::class);
Route::resource('orders', OrderController::class);
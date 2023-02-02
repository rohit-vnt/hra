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

Route::get('/', function () {
    return view('welcome');
});
Route::view('/dashboard','index');
Route::view('/account','account');
Route::view('/','login');
Route::view('/login','login');
Route::view('/register','register');
Route::view('/forgot-password','forgot-password');
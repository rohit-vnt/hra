<?php

use App\Http\Controllers\Controller;
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
Route::view('/','login')->name('login');
Route::view('/register','register');
Route::view('/forgot-password','forgot-password');

Route::post('/login',[Controller::class,'login']);
Route::get('/logout',[Controller::class,'logout']);

Route::middleware('auth')->group(function(){
    Route::get('/dashboard',function(){
        return view('index');
    })->name('dashboard');

    Route::get('/account',function(){
        return view('account');
    })->name('account');

    Route::get('/add-employee',function(){
        return view('add-employee');
    })->name('account');

    Route::post('/addEmployee',[Controller::class,'addEmployee']);
});
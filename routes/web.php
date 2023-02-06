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
Route::get('/',function(){
    return view('login');
})->name('login');
Route::view('/login','login');

Route::get('/forgot-password',function(){
    return view('forgot-password');
})->name('forgot-password');


Route::post('/login',[Controller::class,'login']);
Route::get('/logout',[Controller::class,'logout'])->name('logout');
Route::post('/resetPassword',[Controller::class,'forgetPwdMail']);

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

    Route::get('/changePwd',function(){
        return view('changePwd');
    })->name('changePwd');
    Route::post('/changePwd',[Controller::class,'changePwd']);
});

Route::get('/salary',[Controller::class,
            'importView'])->name('import-view');
Route::post('/import',[Controller::class,
        'import'])->name('import');
Route::get('/export-users',[Controller::class,
        'exportUsers'])->name('export-users');
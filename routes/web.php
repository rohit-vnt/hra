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
Route::get('/salary-slip',[Controller::class,'salarySlip']);
Route::get('/logout',[Controller::class,'logout'])->name('logout');
Route::post('/resetPassword',[Controller::class,'forgetPwdMail']);

// login mendatory
Route::middleware('auth')->group(function(){
    // get routes
    Route::get('/dashboard',function(){
        return view('index');
    })->name('dashboard');
    Route::get('/account',[Controller::class,'account'])->name('account');
    Route::get('/add-employee',[Controller::class,'addEmp']);
    Route::get('/manage-emp',[Controller::class,'manageEmp'])->name('manage');
    Route::get('/changePwd',function(){
        return view('changePwd');
    })->name('changePwd');
    Route::get('/salary',[Controller::class,'importView'])->name('import-view');
            Route::get('/export-users',[Controller::class,'exportUsers'])->name('export-users');

    // post routes
    Route::post('/import',[Controller::class,'import'])->name('import');
    Route::post('/addEmployee',[Controller::class,'addEmployee']);
    Route::post('/changePwd',[Controller::class,'changePwd']);
    Route::post('/deleteEmployee',[Controller::class,'deleteEmployee']);
    Route::post('/updateProfile',[Controller::class,'updateProfile']);
    Route::post('/salaryMail',[Controller::class,'salaryMail']);
});


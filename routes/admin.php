<?php

use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "admin" middleware group. Make something great!
|
*/

Route::prefix('admin')->name('admin.')->group(function(){
    
    Route::controller(AuthController::class)->group(function() {
        Route::get('login' , 'loginForm')->name('loginForm')->middleware('guest:admin');
        Route::get('register' , 'registerForm')->name('registerForm')->middleware('guest:admin');
        Route::post('login' , 'login')->name('login');
        Route::post('register' , 'register')->name('register');
        Route::get('dashboard' , 'index')->name('dashboard')->middleware('checkAdmin');
        Route::post('logout' , 'logout')->name('logout');
    });
});



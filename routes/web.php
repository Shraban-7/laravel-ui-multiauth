<?php

use App\Http\Controllers\Backend\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// backend routes

Route::get('admin/login',[AdminController::class,'adminLoginView'])->name('admin.login.view');
Route::post('admin/login',[AdminController::class,'adminLogin'])->name('admin.login');
Route::group(['prefix'=>'admin','middleware'=>'admin'],function (){
    Route::get('dashboard',[DashboardController::class,'adminDashboard'])->name('admin.dashboard');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

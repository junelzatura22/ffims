<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FarmerController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\TechnicianController;
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


Route::get('/',[AuthController::class,'login'])->name('Function for login');
Route::post('/',[AuthController::class,'getData'])->name('Get user credentials');
Route::get('logout',[AuthController::class,'logout'])->name('Logout');



    Route::group(['middleware'=>'admin','prefix'=>'admin'], function(){
    Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('admin.dashboard');
    Route::get('/user/list',[AdminController::class,'userList'])->name('userlist');
    // position crud 
    Route::get('/management/position',[PositionController::class,'index'])->name('management.position');
    Route::post('/management/position', [PositionController::class, 'store'])->name('store');
    Route::get('/management/fetchall', [PositionController::class, 'fetchAll'])->name('fetchAll');
    Route::get('/management/delete/{id}', [PositionController::class, 'delete'])->name('delete');
    Route::get('/management/position/{id}', [PositionController::class, 'edit'])->name('edit');
    Route::post('/management/update', [PositionController::class, 'update'])->name('update');
    // Designation
});

Route::group(['middleware'=>'technician'], function(){
    Route::get('technician/dashboard',[DashboardController::class,'dashboard'])->name('Technician Dashboard');
});

Route::group(['middleware'=>'farmer'], function(){
    Route::get('farmer/dashboard',[DashboardController::class,'dashboard'])->name('Farmer Dashboard');
});

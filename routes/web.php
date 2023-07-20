<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AssignCommodityController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommodityController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\FarmerFisherfolk;
use App\Http\Controllers\FarmingActivity;
use App\Http\Controllers\FarmingActivityController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\RegionProvinceMunBarangay;
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

Route::get('/', [AuthController::class, 'login'])->name('Function for login');
Route::post('/', [AuthController::class, 'getData'])->name('Get user credentials');
Route::get('logout', [AuthController::class, 'logout'])->name('Logout');

Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
    //user
    Route::get('/user/list', [AdminController::class, 'userList'])->name('userlist');
    Route::get('/user/register', [AdminController::class, 'register'])->name('register.user');
    Route::post('/user/register', [AdminController::class, 'store'])->name('store.user');
    Route::get('/user/list/{id}', [AdminController::class, 'edit'])->name('edit.user');
    Route::post('/user/list/{id}', [AdminController::class, 'update'])->name('updateUser');
    Route::get('/user/status/{id}', [AdminController::class, 'getStatus'])->name('status.user');
    Route::post('/user/status/{id}', [AdminController::class, 'updateStatus'])->name('updatestatus.user');
    //for the assigned barangay, province, region and municipality

    Route::get('/user/getprovince/{regCode}', [RegionProvinceMunBarangay::class, 'getProvince'])->name('getProvince.RegionProvinceMunBarangay');
    Route::get('/user/getcityMun/{provCode}', [RegionProvinceMunBarangay::class, 'getCityMun'])->name('getCityMun.RegionProvinceMunBarangay');
    Route::get('/user/getBarangay/{citymunCode}', [RegionProvinceMunBarangay::class, 'getBarangay'])->name('getBarangay.RegionProvinceMunBarangay');
    //wala ni gamit ang assignment 
    Route::get('/user/assignment/{id}', [AssignCommodityController::class, 'assignment'])->name('assignment.user');
    Route::post('/user/assignment', [AssignCommodityController::class, 'saveAssignment'])->name('save.user.assignment');
    // position crud
    Route::get('/management/position', [PositionController::class, 'index'])->name('management.position');
    Route::post('/management/position', [PositionController::class, 'store'])->name('store.position');
    Route::get('/management/fetchall', [PositionController::class, 'fetchAll'])->name('fetchAll.position');
    Route::get('/management/delete/{id}', [PositionController::class, 'delete'])->name('delete.position');
    Route::get('/management/position/{id}', [PositionController::class, 'edit'])->name('edit.position');
    Route::post('/management/update', [PositionController::class, 'update'])->name('update.position');
    // Designation
    Route::get('/management/designation', [DesignationController::class, 'index'])->name('management.designation');
    Route::post('/management/designation', [DesignationController::class, 'store'])->name('store.designation');
    Route::post('/management/edit/', [DesignationController::class, 'edit'])->name('edit.designation');
    Route::post('/management/delete/', [DesignationController::class, 'delete'])->name('delete.designation');
    // Commodity
    Route::get('/management/commodity', [CommodityController::class, 'index'])->name('index.commodity');
    Route::post('/management/storecom', [CommodityController::class, 'store'])->name('store.commodity');
    Route::post('/management/editcom', [CommodityController::class, 'edit'])->name('edit.commodity');
    Route::post('/management/deletecom', [CommodityController::class, 'delete'])->name('delete.commodity');
    //Farm Commodity
    Route::get('/management/farmactivity', [FarmingActivityController::class, 'index'])->name('index.farmactivity');
    Route::post('/management/farmactivity', [FarmingActivityController::class, 'store'])->name('store.farmactivity');
    Route::post('/management/edit', [FarmingActivityController::class, 'edit'])->name('edit.farmactivity');
    Route::post('/management/delete', [FarmingActivityController::class, 'delete'])->name('delete.farmactivity');
    //Farmer and fisherfolk
    Route::get('/f2/faf',[FarmerFisherfolk::class,'index'])->name('f2.list');
    Route::get('/f2/register',[FarmerFisherfolk::class,'register'])->name('f2.register');
    Route::post('/f2/register',[FarmerFisherfolk::class,'save'])->name('f2.save');
    Route::get('/f2/mod/{id}',[FarmerFisherfolk::class,'getdatatoedit'])->name('f2.getdata');
    Route::post('/f2/mod/{id}',[FarmerFisherfolk::class,'updatefarmer'])->name('f2.update');
    Route::get('/f2/activity/{id}',[FarmerFisherfolk::class,'activity'])->name('f2.activity');
    //Add Farmer
    Route::get('/f2/farm/{id}',[FarmerFisherfolk::class,'addfarm'])->name('f2.addfarm');
});

Route::group(['middleware' => 'technician'], function () {
    Route::get('technician/dashboard', [DashboardController::class, 'dashboard'])->name('Technician.Dashboard');
});

Route::group(['middleware' => 'farmer'], function () {
    Route::get('farmer/dashboard', [DashboardController::class, 'dashboard'])->name('Farmer.Dashboard');
});

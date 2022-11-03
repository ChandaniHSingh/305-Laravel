<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceProviderController;
use App\Http\Controllers\ComplainController;


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

// Registration new Customer
Route::get('/registration',[CustomerController::class,'addCustomer']);
Route::post('/insertcustomer',[CustomerController::class,'insertCustomer']);
// Login
Route::get('/login',[LoginController::class,'viewLogin']);
Route::post('/checklogin',[LoginController::class,'checkLogin']);

// Logout
Route::get('/checklogout',[LogoutController::class,'checkLogout']);

// Admin 
// Home
Route::get('/admin/home',[HomeController::class,'viewHome']);
// Product
Route::get('/admin/viewproduct',[ProductController::class,'viewProduct']);
Route::get('/admin/addproduct',[ProductController::class,'addProduct']);
Route::post('/admin/insertproduct',[ProductController::class,'insertProduct']);
Route::get('/admin/editproduct/{id}',[ProductController::class,'editProduct']);
Route::post('/admin/updateproduct',[ProductController::class,'updateProduct']);
Route::get('/admin/deleteproduct/{id}',[ProductController::class,'deleteProduct']);
// ServiceProvider
Route::get('/admin/viewserviceprovider',[ServiceProviderController::class,'viewServiceProvider']);
Route::get('/admin/addserviceprovider',[ServiceProviderController::class,'addServiceProvider']);
Route::post('/admin/insertserviceprovider',[ServiceProviderController::class,'insertServiceProvider']);
Route::get('/admin/editserviceprovider/{id}',[ServiceProviderController::class,'editServiceProvider']);
Route::post('/admin/updateserviceprovider',[ServiceProviderController::class,'updateServiceProvider']);
Route::get('/admin/deleteserviceprovider/{id}',[ServiceProviderController::class,'deleteServiceProvider']);
// Complain
Route::get('/admin/viewcomplain',[ComplainController::class,'viewComplainByAdmin']);
Route::get('/admin/allocatecomplain/{id}',[ComplainController::class,'allocateComplainByAdmin']);
Route::post('/admin/updatecomplain',[ComplainController::class,'updateComplainByAdmin']);
Route::get('/admin/deletecomplain/{id}',[ComplainController::class,'deleteComplainByAdmin']);


// Customer 
// Home
Route::get('/customer/home',[HomeController::class,'viewHome']);
// Complain
Route::get('/customer/viewcomplain',[ComplainController::class,'viewComplainByCustomer']);
Route::get('/customer/addcomplain',[ComplainController::class,'addComplainByCustomer']);
Route::post('/customer/insertcomplain',[ComplainController::class,'insertComplainByCustomer']);


// Service Provider 
// Home
Route::get('/serviceprovider/home',[HomeController::class,'viewHome']);
// Complain
Route::get('/serviceprovider/viewcomplain',[ComplainController::class,'viewComplainByServiceProvider']);
Route::get('/serviceprovider/completecomplain/{id}',[ComplainController::class,'completeComplainByServiceProvider']);


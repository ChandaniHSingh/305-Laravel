<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShoppingReportController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ConfirmPaymentController;
use App\Http\Controllers\PaySlipController;

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
Route::get('/admin/home',[HomeController::class,'viewHomeByAdmin']);
// Category
Route::get('/admin/viewcategory',[CategoryController::class,'viewCategoryByAdmin']);
Route::get('/admin/addcategory',[CategoryController::class,'addCategoryByAdmin']);
Route::post('/admin/insertcategory',[CategoryController::class,'insertCategoryByAdmin']);
Route::get('/admin/editcategory/{id}',[CategoryController::class,'editCategoryByAdmin']);
Route::post('/admin/updatecategory',[CategoryController::class,'updateCategoryByAdmin']);
Route::get('/admin/deletecategory/{id}',[CategoryController::class,'deleteCategoryByAdmin']);
// SubCategory
Route::get('/admin/viewsubcategory',[SubCategoryController::class,'viewSubCategoryByAdmin']);
Route::get('/admin/addsubcategory',[SubCategoryController::class,'addSubCategoryByAdmin']);
Route::post('/admin/insertsubcategory',[SubCategoryController::class,'insertSubCategoryByAdmin']);
Route::get('/admin/editsubcategory/{id}',[SubCategoryController::class,'editSubCategoryByAdmin']);
Route::post('/admin/updatesubcategory',[SubCategoryController::class,'updateSubCategoryByAdmin']);
Route::get('/admin/deletesubcategory/{id}',[SubCategoryController::class,'deleteSubCategoryByAdmin']);
Route::get('/admin/ajaxSubCategoryByAdmin/{id}',[SubCategoryController::class,'ajaxSubCategoryByAdmin']);
// Product
Route::get('/admin/viewproduct',[ProductController::class,'viewProductByAdmin']);
Route::get('/admin/addproduct',[ProductController::class,'addProductByAdmin']);
Route::post('/admin/insertproduct',[ProductController::class,'insertProductByAdmin']);
Route::get('/admin/editproduct/{id}',[ProductController::class,'editProductByAdmin']);
Route::post('/admin/updateproduct',[ProductController::class,'updateProductByAdmin']);
Route::get('/admin/deleteproduct/{id}',[ProductController::class,'deleteProductByAdmin']);
// ShoppingReport
Route::get('/admin/viewshoppingreport',[ShoppingReportController::class,'viewShoppingReportByAdmin']);
Route::get('/admin/ajaxDateWiseSalesByAdmin/{sdate}/{edate}',[ShoppingReportController::class,'ajaxDateWiseSalesByAdminByAdmin']);


// Customer 
// Home
Route::get('/customer/home',[HomeController::class,'viewHomeByCustomer']);
// Product
Route::get('/customer/viewproduct',[ProductController::class,'viewProductByCustomer']);
Route::get('/customer/ajaxProductByCustomer/{cid}/{scid}',[ProductController::class,'ajaxProductByCustomer']);
// SubCategory
Route::get('/customer/ajaxSubCategoryByCustomer/{id}',[SubCategoryController::class,'ajaxSubCategoryByCustomer']);
// Cart
Route::post('/customer/manageCartByCustomer',[CartController::class,'manageCartByCustomer']);
Route::get('/customer/viewcart',[CartController::class,'viewCartByCustomer']);
Route::get('/customer/removecartitem/{pid}',[CartController::class,'removeCartItemByCustomer']);
// ConfirmPayment
Route::get('/customer/viewconfirmpayment/{amt}',[ConfirmPaymentController::class,'viewConfirmPaymentByCustomer']);
Route::get('/customer/confirmpayment/{amt}',[ConfirmPaymentController::class,'confirmPaymentByCustomer']);
// PaySlip
Route::get('/customer/viewpayslip/{amt}/{invoiceID}',[PaySlipController::class,'viewPaySlipByCustomer']);
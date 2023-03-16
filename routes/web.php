<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PenjualController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware(['guest'])->group(function () {
    
});

Route::middleware('aksesdashboard')->group(function () {
    Route::get('/dshboard',[DashboardController::class,'index'])->name('dashboard.view');
});

Route::middleware(['admin'])->group(function () {
    Route::get('/member',[AdminController::class,'member'])->name('member.view'); 
});
Route::middleware(['handlehome'])->group(function () {
    
    Route::get('/',[MemberController::class,'index']);
    Route::get('/explore',[MemberController::class,'explore']);
    
});
Route::middleware(['member'])->group(function () {
    Route::get('/yourorder',[MemberController::class,'yourorder']);
    Route::get('/cart',[MemberController::class,'cart']);
});

Route::middleware('vm')->group(function () {
    Route::get('/penjual',[PenjualController::class,'index']);
    Route::post('/pesanan/{id}',[PesananController::class,'create']);
    Route::get('/hapuspesanan/{id}',[PesananController::class,'hapus']);
    Route::post('/checkout/{id}',[PesananController::class,'checkout']);
    
});
Route::get('/pesanan',[PesananController::class,'view']);

// manage login, logout, & register
Route::get('/login',[LoginController::class,'login'])->name('login');
Route::post('/auth',[LoginController::class,'auth'])->name('auth');
Route::get('/register',[LoginController::class,'register']);
Route::post('/logout',[LoginController::class,'logout'])->name('logout');
// manage penjual
Route::post('/penjual/create',[PenjualController::class,'store'])->middleware('vm');

// admin
// manage product 
Route::get('/gambar/delete/{id}',[ProductController::class,'destroy_img']);
Route::get('/product',[AdminController::class,'product'])->name('product.view');
Route::get('/product/detail/{id}',[ProductController::class,'detail']);
Route::get('/product/add',[ProductController::class,'create'])->name('product.add');
Route::post('/product/store',[ProductController::class,'store'])->name('product.store');
Route::get('/product/edit/{id}',[ProductController::class,'edit']);
Route::post('/product/update/{id}',[ProductController::class,'update']);
Route::get('/product/delete/{id}',[ProductController::class,'destroy']);
// manage member
Route::get('/member/edit/{id}',[MemberController::class,'edit']);
Route::post('/member/request/edit/{id}',[MemberController::class,'aktif']);
Route::get('/member/delete/{id}',[MemberController::class,'destroy']);
Route::post('/member/create',[UserController::class,'create'])->name('member.create');
// manage profile
Route::get('/profile',[DashboardController::class,'profile']);
Route::get('/profile/edit',[DashboardController::class,'edit']);
Route::post('/profile/update',[DashboardController::class,'update']);
// manage pesanan
// manage category
Route::get('/category',[AdminController::class,'category'])->name('category.view');
Route::post('/category/create',[CategoryController::class,'store'])->name('category.create');
Route::get('/category/edit/{id}',[CategoryController::class,'edit']);
Route::get('/category/update',[CategoryController::class,'update']);
Route::get('/category/delete/{id}',[CategoryController::class,'destroy']);
// gust
// Route::get('/detailpesanan',[PesananController::class,'detailpesanan']);
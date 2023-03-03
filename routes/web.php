<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PenjualController;
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


Route::get('/dshboard',[DashboardController::class,'index'])->name('dashboard.view');
Route::get('/profile',[DashboardController::class,'profile']);
Route::get('/profile/edit',[DashboardController::class,'edit']);
Route::post('/profile/update',[DashboardController::class,'update']);
Route::get('/member',[AdminController::class,'member'])->name('member.view');
Route::get('/member/edit/{id}',[MemberController::class,'edit']);
Route::get('/member/delete/{id}',[MemberController::class,'destroy']);
Route::get('/product',[AdminController::class,'product'])->name('product.view');
Route::get('/product/edit/{id}',[ProductController::class,'edit']);
Route::post('/product/update/{id}',[ProductController::class,'update']);
Route::get('/product/delete/{id}',[ProductController::class,'destroy']);
Route::get('/category',[AdminController::class,'category'])->name('category.view');
Route::get('/category/delete/{id}',[CategoryController::class,'destroy']);
Route::get('/category/update',[CategoryController::class,'update'])->name('category.update');
Route::get('/login',[LoginController::class,'login'])->name('login');
Route::get('/register',[LoginController::class,'register']);
Route::post('/member/create',[UserController::class,'create'])->name('member.create');
Route::post('/category/create',[CategoryController::class,'store'])->name('category.create');
Route::post('/auth',[LoginController::class,'auth'])->name('auth');
Route::post('/logout',[LoginController::class,'logout'])->name('logout');
Route::get('/',[MemberController::class,'index']);
Route::get('/penjual',[PenjualController::class,'index']);
Route::prefix('member')->middleware('auth')->group(function () {
    Route::get('/explore',[MemberController::class,'explore']);
});
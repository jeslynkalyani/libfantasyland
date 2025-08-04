<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;

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

Route::get('/',[BookController::class,'booklist'])->name('book.show');
Route::get('/{book}',[BookController::class,'detailbook'])->name('book.detail');
Route::get('book/toupdate/{book}',[BookController::class,'bookupdate'])->name('book.toupdate')->middleware('auth');
Route::put('/book/update/{book}',[BookController::class,'update'])->name('book.update')->middleware('auth');
Route::get('/book/create',[BookController::class,'create'])->name('book.create')->middleware('auth');
Route::post('/book/store',[BookController::class,'store'])->name('book.store')->middleware('auth');
Route::delete('/book/del/{id}',[BookController::class,'delete'])->name('book.delete')->middleware('auth');
Route::get('/auth/register',[AuthController::class,'register'])->name('register');
Route::post('/auth/doregister',[AuthController::class,'doRegister'])->name('doregister');
Route::get('/auth/login',[AuthController::class,'login'])->name('login');
Route::post('/auth/dologin',[AuthController::class,'doLogin'])->name('dologin');
Route::get('/auth/logout',[AuthController::class,'logout'])->name('logout');

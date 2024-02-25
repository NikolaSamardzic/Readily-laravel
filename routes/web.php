<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\LoginController;
use \App\Http\Controllers\UserController;
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

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/login', [LoginController::class,'index'])->name('login.index');
Route::get('/login/logout', [LoginController::class,'logout'])->name('login.logout');
Route::post('/login', [LoginController::class,'login'])->name('login.submit');
Route::get('/users/{token}/activate', [UserController::class,'activate'])->where('token', '[a-zA-Z0-9]+')->name('users.activate');
Route::get('/users/create', [UserController::class,'create'])->name('users.create');
Route::post('/users', [UserController::class,'store'])->name('users.store');
Route::get('/users/{id}', [UserController::class,'show'])->name('users.show');

<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\LoginController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\Cart;
use \App\Http\Controllers\CommentController;
use \App\Http\Controllers\ReviewController;
use \App\Http\Controllers\ShopController;
use \App\Http\Controllers\MessageController;
use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\AdminController;
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

Route::get('/admin',[AdminController::class,'index'])->name('admin.index');

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/login', [LoginController::class,'index'])->name('login.index');
Route::get('/login/logout', [LoginController::class,'logout'])->name('login.logout');
Route::post('/login', [LoginController::class,'login'])->name('login.submit');
Route::get('/users/{token}/activate', [UserController::class,'activate'])->where('token', '[a-zA-Z0-9]+')->name('users.activate');
Route::get('/users/create', [UserController::class,'create'])->name('users.create');
Route::post('/users', [UserController::class,'store'])->name('users.store');
Route::get('/users/{user}', [UserController::class,'show'])->name('users.show');
Route::delete('/users/{user}', [UserController::class,'destroy'])->name('users.destroy');
Route::get('/users/{id}/edit', [UserController::class,'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class,'update'])->name('users.update');
Route::get('/users',[UserController::class,'index'])->name('users.index');
Route::put('/users/{id}/activate', [UserController::class,'activateUser'])->name('users.activate');
Route::put('/users/{id}/ban', [UserController::class,'banUser'])->name('users.ban');
Route::put('/users/{id}/unban', [UserController::class,'unbanUser'])->name('users.unban');


Route::get('/writers/{id}/books', [BookController::class,'index'])->name('books.index');
Route::get('/writers/{user}/books/create', [BookController::class,'create'])->name('books.create');
Route::get('/writers/{user}/books/{book}/edit', [BookController::class,'edit'])->name('books.edit');
Route::post('/books', [BookController::class,'store'])->name('books.store');
Route::put('/books/{book}', [BookController::class,'update'])->name('books.update');
Route::delete('/books/{book}',[BookController::class,'destroy'])->name('books.destroy');
Route::put('/books/{book}/activate',[BookController::class,'activate'])->name('books.activate');

Route::get('/writers/{user}', [UserController::class,'writer'])->name('user.writer');

Route::patch('/cart', [Cart::class,'add'])->name('cart.add');
Route::get('/checkout', [Cart::class,'checkout'])->name('cart.checkout');
Route::put('/cart/submit',[Cart::class,'submit'])->name('cart.submit');

Route::get('/books/{book}', [BookController::class,'show'])->name('book.show');

Route::post('/comments',[CommentController::class,'store'])->name('comment.store');

Route::post("/reviews",[ReviewController::class,'store']);
Route::put("/reviews/{review}",[ReviewController::class,'update']);

Route::get('/categories',[CategoryController::class,'activeChildren'])->name('category.user.index');
Route::post('/categories/preferred',[CategoryController::class,'preferred']);

Route::get("/shop",[ShopController::class,'index'])->name('shop.index');

Route::post('/messages',[MessageController::class,'store']);

Route::get('/sitemap',function (){
    return redirect(asset('assets/sitemap.xml'));
})->name('sitemap.show');
Route::get('/documentation',function (){
    return redirect(asset('assets/documentation.pdf'));
} )->name('documentation');
Route::get('/rss',function (){
    return redirect(asset('assets/rss.xml'));
} )->name('rss');

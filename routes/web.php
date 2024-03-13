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
use \App\Http\Controllers\DeliveryController;
use \App\Http\Controllers\PublisherController;
use \App\Http\Controllers\OrderController;
use \App\Models\LoggedUser;
use \App\Http\Controllers\LoggedInUsers;
use \App\Http\Controllers\VisitController;
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
Route::middleware(['auth', 'admin'])->group(function() {

    Route::get('/logged/visitors',[VisitController::class,'index'])->name('logged.visitors');
    Route::get('/logged/users',[LoggedInUsers::class,'index'])->name('logged.users');
    Route::get('/orders',[OrderController::class,'index'])->name('orders.index');

    Route::get('/admin/categories',[CategoryController::class,'index'])->name('categories.index');
    Route::delete('/categories/{id}',[CategoryController::class,'destroy'])->name('categories.destroy');
    Route::put('/categories/{id}/activate',[CategoryController::class,'activate'])->name('categories.activate');
    Route::get('/categories/create',[CategoryController::class,'create'])->name('categories.create');
    Route::post('/categories',[CategoryController::class,'store'])->name('categories.store');
    Route::get('/categories/{id}',[CategoryController::class,'edit'])->name('categories.edit');
    Route::put('/categories/{id}',[CategoryController::class,'update'])->name('categories.update');

    Route::get('/admin/publishers',[PublisherController::class,'index'])->name('publishers.index');
    Route::delete('/publishers/{id}',[PublisherController::class,'destroy'])->name('publishers.destroy');
    Route::put('/publishers/{id}/activate',[PublisherController::class,'activate'])->name('publishers.activate');
    Route::get('/publishers/create',[PublisherController::class,'create'])->name('publishers.create');
    Route::post('/publishers',[PublisherController::class,'store'])->name('publishers.store');
    Route::get('/publishers/{id}',[PublisherController::class,'edit'])->name('publishers.edit');
    Route::put('/publishers/{id}',[PublisherController::class,'update'])->name('publishers.update');

    Route::get('/admin',[AdminController::class,'index'])->name('admin.index');
    Route::get('/admin/deliveries',[DeliveryController::class,'index'])->name('delivery.index');
    Route::delete('/deliveries/{id}',[DeliveryController::class,'destroy'])->name('delivery.destroy');
    Route::put('/deliveries/{id}/activate',[DeliveryController::class,'activate'])->name('delivery.activate');
    Route::get('/deliveries/create',[DeliveryController::class,'create'])->name('delivery.create');
    Route::post('/deliveries',[DeliveryController::class,'store'])->name('delivery.store');
    Route::get('/deliveries/{id}',[DeliveryController::class,'edit'])->name('delivery.edit');
    Route::put('/deliveries/{id}',[DeliveryController::class,'update'])->name('delivery.update');

    Route::get('/messages',[MessageController::class,'index'])->name('messages.index');
    Route::delete('/messages/{id}',[MessageController::class,'destroy'])->name('messages.destroy');

    Route::get('/users',[UserController::class,'index'])->name('users.index');


    Route::put('/users/{id}/activate', [UserController::class,'activateUser'])->name('users.activate');
    Route::put('/users/{id}/ban', [UserController::class,'banUser'])->name('users.ban');
    Route::put('/users/{id}/unban', [UserController::class,'unbanUser'])->name('users.unban');
});


Route::middleware(['auth'])->group(function() {
    Route::get('/login/logout', [LoginController::class,'logout'])->name('login.logout');

    Route::get('/users/{user}', [UserController::class,'show'])->name('users.show');

    Route::delete('/users/{user}', [UserController::class,'destroy'])->name('users.destroy');
    Route::get('/users/{id}/edit', [UserController::class,'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class,'update'])->name('users.update');

    Route::get('/writers/{id}/books', [BookController::class,'index'])->name('books.index');

    Route::get('/writers/{user}/books/create', [BookController::class,'create'])->name('books.create');
    Route::get('/writers/{user}/books/{book}/edit', [BookController::class,'edit'])->name('books.edit');
    Route::post('/books', [BookController::class,'store'])->name('books.store');
    Route::put('/books/{book}', [BookController::class,'update'])->name('books.update');
    Route::delete('/books/{book}',[BookController::class,'destroy'])->name('books.destroy');
    Route::put('/books/{book}/activate',[BookController::class,'activate'])->name('books.activate');


    Route::patch('/cart', [Cart::class,'add'])->name('cart.add');
    Route::get('/checkout', [Cart::class,'checkout'])->name('cart.checkout');
    Route::put('/cart/submit',[Cart::class,'submit'])->name('cart.submit');

    Route::post('/comments',[CommentController::class,'store'])->name('comment.store');


    Route::post("/reviews",[ReviewController::class,'store']);
    Route::put("/reviews/{review}",[ReviewController::class,'update']);

    Route::get('/categories',[CategoryController::class,'activeChildren'])->name('category.user.index');
    Route::post('/categories/preferred',[CategoryController::class,'preferred']);

    Route::post('/messages',[MessageController::class,'store']);
});

Route::middleware(['notauth'])->group(function() {
    Route::get('/login', [LoginController::class,'index'])->name('login.index');
    Route::post('/login', [LoginController::class,'login'])->name('login.submit');

    Route::get('/users/{token}/activate', [UserController::class,'activate'])->where('token', '[a-zA-Z0-9]+')->name('users.activate');
    Route::get('/users/create', [UserController::class,'create'])->name('users.create');
    Route::post('/users', [UserController::class,'store'])->name('users.store');
});

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/writers/{user}', [UserController::class,'writer'])->name('user.writer');
Route::get('/books/{book}', [BookController::class,'show'])->name('book.show');
Route::get("/shop",[ShopController::class,'index'])->name('shop.index');

Route::get('/sitemap',function (){
    return redirect(asset('assets/sitemap.xml'));
})->name('sitemap.show');
Route::get('/documentation',function (){
    return redirect(asset('assets/documentation.pdf'));
} )->name('documentation');
Route::get('/rss',function (){
    return redirect(asset('assets/rss.xml'));
} )->name('rss');

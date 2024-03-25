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

Route::group(['prefix'=>'admin', 'middleware' =>['auth','admin']],function (){
    Route::get('/',[AdminController::class,'index'])->name('admin.index');

    Route::resource('categories',CategoryController::class)->withTrashed();
    Route::put('/categories/{categories}/activate',[CategoryController::class,'activate'])->withTrashed()->name('categories.activate');

    Route::resource('publishers',PublisherController::class)->withTrashed();
    Route::put('/publishers/{publishers}/activate',[PublisherController::class,'activate'])->withTrashed()->name('publishers.activate');

    Route::resource('deliveries',DeliveryController::class)->withTrashed();
    Route::put('/deliveries/{deliveries}/activate',[DeliveryController::class,'activate'])->withTrashed()->name('delivery.activate');

    Route::resource('messages',MessageController::class)->only(['index','destroy']);

    Route::group(['prefix'=>'users'],function (){
        Route::get('/',[UserController::class,'index'])->name('users.index');
        Route::put('/{users}/activate', [UserController::class,'activateUser'])->withTrashed()->name('users.activate');
        Route::put('/{users}/ban', [UserController::class,'banUser'])->name('users.ban');
        Route::put('/{users}/unban', [UserController::class,'unbanUser'])->name('users.unban');
    });

    Route::group(['prefix'=>'logg'],function (){
        Route::get('/visitors',[VisitController::class,'index'])->name('logg.visitors');
        Route::get('/users',[LoggedInUsers::class,'index'])->name('logg.users');
        Route::get('/orders',[OrderController::class,'index'])->name('orders.index');
    });
});

Route::middleware(['auth'])->group(function() {
    Route::get('/logout', [LoginController::class,'logout'])->name('logout');

    Route::resource('books',BookController::class)->only(['store','edit','destroy','update']);

    Route::resource('users',UserController::class)->only(['show','destroy','edit','update']);

    Route::resource('reviews',ReviewController::class)->only(['store','update']);

    Route::post('/comments',[CommentController::class,'store'])->name('comment.store');

    Route::post('/messages',[MessageController::class,'store']);

    Route::group(['prefix'=>'writers'],function (){
        Route::get('/{user}/books', [BookController::class,'index'])->name('books.index');
        Route::get('/{user}/books/create', [BookController::class,'create'])->name('books.create');
    });

    Route::group(['prefix'=>'cart'],function (){
        Route::patch('/', [Cart::class,'add'])->name('cart.add');
        Route::get('/checkout', [Cart::class,'checkout'])->name('cart.checkout');
        Route::put('/submit',[Cart::class,'submit'])->name('cart.submit');
    });

    Route::group(['prefix'=>'categories'],function(){
        Route::get('/children',[CategoryController::class,'activeChildren'])->name('category.user.index');
        Route::post('/preferred',[CategoryController::class,'preferred']);
    });
});

Route::middleware(['guest'])->group(function() {
    Route::get('/login', [LoginController::class,'index'])->name('login.index');
    Route::post('/login', [LoginController::class,'login'])->name('login.submit');

    Route::resource('users',UserController::class)->only(['store','create']);
    Route::get('/users/{token}/activate', [UserController::class,'activate'])->where('token', '[a-zA-Z0-9]+')->name('users.activate');
});

Route::get('/author', [HomeController::class,'author'])->name('author');
Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/writers/{user}', [UserController::class,'writer'])->name('user.writer');
Route::get('/books/{book}', [BookController::class,'show'])->name('book.show');
Route::get("/shop",[ShopController::class,'index'])->name('shop.index');

Route::get('/sitemap',function (){
    return redirect(asset('assets/sitemap.xml'));
})->name('sitemap.show');

Route::get('/documentation',function (){
    return redirect(asset('assets/documentation.pdf'));
})->name('documentation');

Route::get('/rss',function (){
    return redirect(asset('assets/rss.xml'));
})->name('rss');

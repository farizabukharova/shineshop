<?php

use App\Http\Controllers\Adm\CategoryController;
use App\Http\Controllers\Adm\RoleController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth2\LoginController;
use App\Http\Controllers\Auth2\RegisterController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Adm\UserController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\ProfileControler;


Route::get('/', function () {
    return view('auth.login');
});

Route::get('lang/{lang}', [LangController::class, 'switchLang'])->name('switch.lang');

Route::middleware('auth')->group(function(){
    Route::resource('/apps', AppController::class)->except('index', 'show');
    Route::resource('/comments', CommentController::class)->only('store', 'destroy');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/cart', [AppController::class, 'cartIndex'])->name('cart.index');
    Route::post('apps/{app}/cart', [AppController::class, 'addCart'])->name('apps.cart');
    Route::post('apps/{app}/uncart', [AppController::class, 'deleteCart'])->name('apps.uncart');
    Route::post('/cart', [AppController::class, 'buy'])->name('cart.buy');

    Route::get('/wallet', [WalletController::class, 'index'])->name('wallet.index');
    Route::get('/wallet/create', [WalletController::class, 'create'])->name('wallet.create');
    Route::post('/wallet/{pay}', [WalletController::class, 'store'])->name('wallet.store');
    Route::get('/wallet/{pay}/edit', [WalletController::class, 'edit'])->name('wallet.edit');
    Route::put('/wallet/{pay}', [WalletController::class, 'update'])->name('wallet.update');
    Route::delete('/wallet/{pay}', [WalletController::class, 'destroy'])->name('wallet.destroy');

    Route::get('/profile/profile', [ProfileControler::class, 'profile'])->name('profile');
    Route::get('/profile{profile}/edit', [ProfileControler::class, 'edit'])->name('profile.edit');
    Route::put('/profile/{id}', [ProfileControler::class, 'update'])->name('profile.update');
    Route::delete('/profile/{profile}', [ProfileControler::class, 'destroy'])->name('profile.destroy');


    Route::prefix('adm')->as('adm.')->middleware('hasrole:admin,moderator')->group(function(){
        Route::resource('/category', CategoryController::class);
        Route::resource('/roles', RoleController::class);

        Route::get('/apps/product', [AppController::class, 'product'])->name('apps.product');
        Route::get('/apps/search', [AppController::class, 'product'])->name('apps.search');
        Route::put('/apps/{app}', [AppController::class, 'update'])->name('apps.update');
        Route::get('/apps/create', [AppController::class, 'create'])->name('apps.create');
        Route::get('/apps{app}/edit', [AppController::class, 'edit'])->name('apps.edit');
        Route::post('/apps/store', [AppController::class, 'store'])->name('apps.store');
        Route::delete('/apps/{app}', [AppController::class, 'destroy'])->name('apps.destroy');
        Route::get('/cart', [AppController::class, 'cart'])->name('cart');
        Route::put('/cart{cart}/confirm', [AppController::class, 'confirm'])->name('cart.confirm');

        Route::get('/apps/product', [AppController::class, 'product'])->name('apps.product');
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/search', [UserController::class, 'index'])->name('users.search');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::put('/users/{user}/ban', [UserController::class, 'ban'])->name('users.ban');
        Route::put('/users/{user}/unban', [UserController::class, 'unban'])->name('users.unban');

    });
});
Route::resource('/apps', AppController::class)->only('index', 'show');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/apps/category/{category}', [AppController::class, 'appCategory'])->name('apps.category');

Route::get('/register', [RegisterController::class, 'create'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::get('/login', [LoginController::class, 'create'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');






























//        Route::get('/users/{user}/edit',[UserController::class,'edit'])->name('users.edit');
//        Route::put('/users/{user}',[UserController::class,'update'])->name('users.update');
//        Route::put('/users/{user}/ban',[UserController::class,'ban'])->name('users.ban');
//        Route::put('/users/{user}/unban',[UserController::class,'unban'])->name('users.unban');

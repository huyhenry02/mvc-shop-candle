<?php

use App\Http\Controllers\Employee\AuthController;
use App\Http\Controllers\Employee\OrderController;
use App\Http\Controllers\Employee\ProductController;
use App\Http\Controllers\Employee\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.layouts.main');
});

Route::group([
    'prefix' => 'admin',
    'middleware' => 'auth'
], function () {

    Route::group([
        'prefix' => 'product'
    ], function () {
        Route::get('/', [ProductController::class, 'index'])->name('product.index');
        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/', [ProductController::class, 'store'])->name('product.store');
        Route::get('/{product}', [ProductController::class, 'show'])->name('product.show');
        Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('/update/{product}', [ProductController::class, 'update'])->name('product.update');
        Route::get('/delete/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
    });

    Route::group([
        'prefix' => 'user'
    ], function () {
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/', [UserController::class, 'store'])->name('user.store');
        Route::get('/{user}', [UserController::class, 'show'])->name('user.show');
        Route::get('/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
        Route::post('/update/{user}', [UserController::class, 'update'])->name('user.update');
        Route::get('/delete/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    });

    Route::group([
        'prefix' => 'order'
    ], function () {
        Route::get('/', [OrderController::class, 'index'])->name('order.index');
        Route::get('/create', [OrderController::class, 'create'])->name('order.create');
        Route::post('/', [OrderController::class, 'store'])->name('order.store');
        Route::get('/{order}', [OrderController::class, 'show'])->name('order.show');
        Route::get('/edit/{order}', [OrderController::class, 'edit'])->name('order.edit');
        Route::post('/update/{order}', [OrderController::class, 'update'])->name('order.update');
        Route::get('/delete/{order}', [OrderController::class, 'destroy'])->name('order.destroy');
    });
});

Route::group([
    'prefix' => 'user',
    'middleware' => 'auth'
], function () {
    Route::group([
        'prefix' => 'auth'
    ], function () {
        Route::get('/login', [AuthController::class, 'login'])->name('login.index');
        Route::post('/login', [AuthController::class, 'postLogin'])->name('login.post');
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    });

    Route::group([
        'prefix' => 'index'
    ], function () {

    });

    Route::group([
        'prefix' => 'cart'
    ], function () {

    });

    Route::group([
        'prefix' => 'shop'
    ], function () {

    });

    Route::group([
        'prefix' => 'checkout'
    ], function () {

    });
});

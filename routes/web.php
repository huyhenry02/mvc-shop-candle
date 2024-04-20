<?php

use App\Http\Controllers\Employee\AuthController;
use App\Http\Controllers\Employee\OrderController;
use App\Http\Controllers\Employee\ProductController;
use App\Http\Controllers\Employee\UserController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\IndexController;
use App\Http\Controllers\User\ShopController;
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
        Route::get('/', [ProductController::class, 'index'])->name('admin.product.index');
        Route::get('/create', [ProductController::class, 'create'])->name('admin.product.create');
        Route::post('/', [ProductController::class, 'store'])->name('admin.product.store');
        Route::get('/{product}', [ProductController::class, 'show'])->name('admin.product.show');
        Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('admin.product.edit');
        Route::post('/update/{product}', [ProductController::class, 'update'])->name('admin.product.update');
        Route::get('/delete/{product}', [ProductController::class, 'destroy'])->name('admin.product.destroy');
    });

    Route::group([
        'prefix' => 'user'
    ], function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
        Route::get('/create', [UserController::class, 'create'])->name('admin.user.create');
        Route::post('/', [UserController::class, 'store'])->name('admin.user.store');
        Route::get('/{user}', [UserController::class, 'show'])->name('admin.user.show');
        Route::get('/edit/{user}', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::post('/update/{user}', [UserController::class, 'update'])->name('admin.user.update');
        Route::get('/delete/{user}', [UserController::class, 'destroy'])->name('admin.user.destroy');
    });

    Route::group([
        'prefix' => 'order',

    ], function () {
        Route::get('/', [OrderController::class, 'index'])->name('admin.order.index');
        Route::get('/{order}', [OrderController::class, 'show'])->name('admin.order.show');
        Route::get('/edit/{order}', [OrderController::class, 'edit'])->name('admin.order.edit');
        Route::post('/update/{order}', [OrderController::class, 'update'])->name('admin.order.update');
        Route::get('/delete/{order}', [OrderController::class, 'destroy'])->name('admin.order.destroy');
    });
});

Route::group([
    'prefix' => 'auth'
], function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login.index');
    Route::get('/register', [AuthController::class, 'register'])->name('register.index');
    Route::post('/login', [AuthController::class, 'postLogin'])->name('login.post');
    Route::post('/register', [AuthController::class, 'postRegister'])->name('register.post');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::group([
    'prefix' => 'user',
], function () {
    Route::group([
        'prefix' => 'index'
    ], function () {
        Route::get('/', [IndexController::class, 'index'])->name('user.index');
    });

    Route::group([
        'prefix' => 'cart',
        'middleware' => 'auth'
    ], function () {
        Route::get('/add/{product_id?}/{quantity?}', [ShopController::class, 'addToCart'])->name('user.cart.add');
        Route::get('/index', [CheckoutController::class, 'indexCart'])->name('user.cart.index');
    });

    Route::group([
        'prefix' => 'shop'
    ], function () {
        Route::get('/index', [ShopController::class, 'index'])->name('user.shop.index');

    });

    Route::group([
        'prefix' => 'checkout'
    ], function () {
        Route::get('/index/{order_id?}', [CheckoutController::class, 'indexCheckout'])->name('user.order.checkout');
        Route::get('/confirmation', [CheckoutController::class, 'indexConfirmation'])->name('user.order.confirmation');
        Route::post('/create', [CheckoutController::class, 'createOrder'])->name('user.order.create');
        Route::post('/approved-order/{orderId}', [CheckoutController::class, 'approvedOrder'])->name('user.approvedOrder');

    });
});

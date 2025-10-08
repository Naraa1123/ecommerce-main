<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\CheckoutController;


Route::controller(HomeController::class)->group(function(){
    Route::get('/','index')->name('home');
    Route::get('/result','search')->name('search');
    Route::get('/result/category','filter')->name('category.filter');
});

Route::controller(CartController::class)->group(function() {
    Route::post('/cart/add','add')->name('cart.add');
    Route::post('/cart/remove','remove')->name('cart.remove');
    Route::post('/cart/clear','clear')->name('cart.clear');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::prefix('/admin')->middleware(AdminMiddleware::class)->name('admin.')->group(function(){

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::controller(CategoryController::class)->group(function() {
        Route::get('/categories', 'index')->name('category');
        Route::get('/categories/create', 'create');
        Route::post('/categories/store', 'store')->name('category.store');
        Route::get('/categories/{id}', 'show');
        Route::get('/categories/{id}/edit', 'edit');
        Route::put('/categories/{id}', 'update');
        Route::delete('/categories/{id}', 'destroy');
    });

    Route::controller(ProductController::class)->group(function(){
        Route::get('/products', 'index')->name('products');
        Route::get('/products/create', 'create')->name('product.create');
        Route::post('/products/store', 'store')->name('product.store');
        Route::get('/products/{id}', 'show')->name('product.show');
        Route::get('/products/{id}/edit', 'edit')->name('product.edit');
        Route::put('/products/{id}', 'update')->name('product.update');
        Route::delete('/products/{id}', 'destroy')->name('product.delete');
    });

    Route::controller(OrderController::class)->group(function(){
       Route::get('/orders', 'index')->name('orders');
       Route::get('/order/show/{id}', 'show')->name('order.show');
       Route::post('/order/status/paid/{id}', 'paid')->name('order.markPaid');
    });

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/cart/show',[CartController::class,'show'])->name('cart.show');
    Route::get('/order/history',[CartController::class,'history'])->name('order.history');

    Route::controller(CheckoutController::class)->group(function() {
        Route::get('/checkout/{id}', 'index')->name('user.checkout');
        Route::get('/order/save', 'store')->name('order.save');
    });
});

require __DIR__.'/auth.php';

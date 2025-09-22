<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', function () {
    return view('welcome');
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

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';

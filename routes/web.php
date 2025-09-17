<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/dashboard', function () {
   return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.category');
    Route::get('/admin/categories/create', [CategoryController::class, 'create']);
    Route::post('/admin/categories/store', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/admin/categories/{id}', [CategoryController::class, 'show']);
    Route::get('/admin/categories/{id}/edit', [CategoryController::class, 'edit']);
    Route::put('/admin/categories/{id}', [CategoryController::class, 'update']);
    Route::delete('/admin/categories/{id}', [CategoryController::class, 'destroy']);

    Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products');
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.product.create');
    Route::post('/admin/products/store', [ProductController::class, 'store'])->name('admin.product.store');
    Route::get('/admin/products/{id}', [ProductController::class, 'show'])->name('admin.product.show');
    Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.product.edit');
    Route::put('/admin/products/{id}', [ProductController::class, 'update'])->name('admin.product.update');
    Route::delete('/admin/products/{id}', [ProductController::class, 'destroy'])->name('admin.product.delete');


});

require __DIR__.'/auth.php';

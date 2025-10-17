<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::controller(CartController::class)->group(function(){
    Route::post('/cart/{id}/increase','increase')->name('cart.increase');
    Route::post('/cart/{id}/decrease','decrease')->name('cart.decrease');
});

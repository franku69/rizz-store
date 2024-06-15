<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('/product', [ProductController::class, 'store'])->name('product.store');
Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('/product/{product}/update', [ProductController::class, 'update'])->name('product.update');
Route::delete('/product/{product}/destroy', [ProductController::class, 'destroy'])->name('product.destroy');
Route::get('/search', [ProductController::class, 'search'])->name('product.search');
Route::get('/product/suggestions', [ProductController::class, 'suggestions'])->name('product.suggestions');
Route::get('/upload', [ProductController::class, 'indexed'])->name('product.upload');
Route::get('/checkout', function () {
    // Placeholder logic, redirecting back to product index
    return redirect()->route('product.index')->with('error', 'Checkout functionality is not implemented yet.');
})->name('checkout.index');
Route::get('/product/sorted', [ProductController::class, 'indexsort'])->name('product.indexsort');
Route::get('/', [HomeController::class, 'index'])->name('home');

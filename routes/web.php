<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::view('/', 'welcome');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create'])->middleware('auth')->name('product.create');
Route::post('/product', [ProductController::class, 'store'])->middleware('auth')->name('product.store');
Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->middleware('auth')->name('product.edit');
Route::put('/product/{product}/update', [ProductController::class, 'update'])->middleware('auth')->name('product.update');
Route::delete('/product/{product}/destroy', [ProductController::class, 'destroy'])->middleware('auth')->name('product.destroy');

Route::get('/search', [ProductController::class, 'search'])->name('product.search');
Route::get('/product/suggestions', [ProductController::class, 'suggestions'])->name('product.suggestions');

Route::get('/upload', [ProductController::class, 'indexed'])->middleware('auth')->name('product.upload');
Route::get('/checkout', [ProductController::class, 'checkout'])->middleware('auth')->name('checkout.index');
Route::get('/checkout', [ProductController::class, 'showCheckout'])->middleware('auth')->name('checkout.show');
Route::post('/checkout', [ProductController::class, 'processCheckout'])->middleware('auth')->name('checkout.process');
Route::get('/product/sorted', [ProductController::class, 'indexsort'])->name('product.indexsort');
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

    Route::middleware(['auth', 'verified'])->group(function () {
        Route::view('dashboard', 'dashboard')->name('dashboard');
        Route::view('profile', 'profile')->name('profile');
    });
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');

require __DIR__.'/auth.php';

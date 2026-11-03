<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController; 
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\Admin\AboutController;

// 1. FRONTEND ROUTES (Pengunjung - Publik)
Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/shop', [FrontController::class, 'shop'])->name('shop');
Route::get('/shop/product/{slug}', [FrontController::class, 'showProduct'])->name('product.detail');
Route::get('/about', [FrontController::class, 'about'])->name('about');
Route::get('/contact', [FrontController::class, 'contact'])->name('contact');
Route::post('/contact', [FrontController::class, 'sendContact'])->name('contact.send');


// 2. AUTO-REDIRECTS (Wajib Login)
Route::middleware(['auth'])->group(function () {
    Route::redirect('/admin', '/admin/dashboard');
    Route::redirect('/dashboard', '/admin/dashboard');
});

// 3. BACKEND ROUTES (Admin - Dilindungi Middleware Auth)
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('products', ProductController::class);

    Route::get('/about', [\App\Http\Controllers\Admin\AboutController::class, 'index'])->name('about.index');
    Route::post('/about', [\App\Http\Controllers\Admin\AboutController::class, 'update'])->name('about.update');    
    
    Route::get('/contact', [\App\Http\Controllers\Admin\ContactController::class, 'index'])->name('contact.index');
    Route::post('/contact', [\App\Http\Controllers\Admin\ContactController::class, 'update'])->name('contact.update');          

    Route::get('/messages', [\App\Http\Controllers\Admin\MessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/{id}', [\App\Http\Controllers\Admin\MessageController::class, 'show'])->name('messages.show');
    Route::delete('/messages/{id}', [\App\Http\Controllers\Admin\MessageController::class, 'destroy'])->name('messages.destroy');
    });


    Route::get('/dashboard', function () {return redirect()->route('admin.dashboard');})->middleware(['auth'])->name('dashboard');

    Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
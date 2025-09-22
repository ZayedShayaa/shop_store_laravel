<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\Admin\OrderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', [SiteController::class, 'index'])->name('/');
Route::get('/search', [SiteController::class, 'search'])->name('search');
Route::get('/section/{id}', [SiteController::class, 'section_show'])->name('section');
Route::get('/product_details/{id}', [SiteController::class, 'product_details'])->name('product_details');



Route::middleware('auth')->group(function () {
    Route::get('/cart/delete/{id}', [SiteController::class, 'delete_item'])->name('cart.delete');
    Route::get('/cart/index', [SiteController::class, 'show_cart'])->name('cart.index');
    Route::post('/cart', [SiteController::class, 'cart'])->name('cart');
    Route::post('/order', [SiteController::class, 'order'])->name('order');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::DELETE('/orders/destroy/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');
    Route::get('/orders/show/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('/admin', [ProfileController::class, 'edit_admin'])->name('admin.edit');
    Route::get('/dashboard', function () {
        // return Auth::check();
        return view('admin.index');
    })->middleware('auth')->name('dashboard');
    Route::resource('sections', 'App\Http\Controllers\Admin\sectionController');
    Route::resource('products', 'App\Http\Controllers\Admin\ProductController');
    Route::resource('users', 'App\Http\Controllers\Admin\UserController');
});

require __DIR__ . '/auth.php';

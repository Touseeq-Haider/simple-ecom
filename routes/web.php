<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\OrderController;

// -------------------------------------------
// FRONTEND ROUTES
// -------------------------------------------

// Home / Landing Page
Route::get('/', [HomeController::class,'index'])->name('home');

// Shop Page
Route::get('/shop', [HomeController::class,'shop'])->name('shop');

// Product Detail
Route::get('/product/{id}', [HomeController::class,'productDetail'])->name('product.detail');

// Cart Routes
Route::post('/add-to-cart/{id}', [CartController::class,'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class,'cart'])->name('cart.page');
Route::post('/cart/remove/{id}', [CartController::class,'remove'])->name('cart.remove');
Route::post('/cart/update/{id}', [CartController::class,'update'])->name('cart.update');

// Checkout / Orders
Route::get('/checkout', [OrderController::class,'checkout'])->name('checkout');
Route::post('/checkout', [OrderController::class,'placeOrder'])->name('checkout.place');
Route::get('/thank-you', [OrderController::class,'thankYou'])->name('checkout.thankyou');

// -------------------------------------------
// AUTH ROUTES
// -------------------------------------------
Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// -------------------------------------------
// ADMIN ROUTES
// -------------------------------------------

// All routes prefixed with /admin and named with 'admin.' 
// Middleware 'auth' + 'admin' ensures only admin users can access
Route::prefix('admin')->middleware(['auth','admin'])->name('admin.')->group(function () {

    // Admin Dashboard
    Route::get('/', function () {
        return view('admin.admindashboard'); // Create this view
    })->name('dashboard');

    // Category CRUD
    Route::resource('categories', CategoryController::class);

    // Product CRUD
    Route::resource('products', ProductController::class);

    // Orders Management
    Route::get('orders', [AdminOrderController::class,'index'])->name('orders.index');
    Route::get('orders/{order}', [AdminOrderController::class,'show'])->name('orders.show');
    Route::post('orders/{order}/update', [AdminOrderController::class,'updateStatus'])->name('orders.updateStatus');
});

// -------------------------------------------
// Require default auth routes
// -------------------------------------------
require __DIR__.'/auth.php';
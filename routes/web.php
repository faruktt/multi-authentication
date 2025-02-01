<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

// Frontend route
Route::get('/', function () {
    return view('fontend.fontend');
})->name('frontend.index');

// Admin route
Route::get('/admin', function () {
    return view('admin.admin');
})->name('dashboard');

// Profile routes
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


Route::middleware('auth')->group(function(){
    // Category routes
    Route::get('/category', [CategoryController::class, 'category'])->name('category');
    Route::post('/category/add', [CategoryController::class, 'category_add'])->name('category.add');
    // Product routes
    Route::get('/product', [ProductController::class, 'product'])->name('product');
    Route::post('/product/add', [ProductController::class, 'product_add'])->name('product.add');
    Route::get('/view/order', [CartController::class, 'view_order'])->name('view.order');
    Route::get('/confirm/order/{id}', [CartController::class, 'confirm_order'])->name('confirm.order');
});

// Customer routes
Route::get('/customer', [CustomerController::class, 'customer'])->name('customer');
Route::get('/login/page', [CustomerController::class, 'login_page'])->name('login_page');
Route::post('/customer/store', [CustomerController::class, 'customer_store'])->name('customer.store');
Route::post('/customer/login', [CustomerController::class, 'customer_login'])->name('customer.login');
Route::get('/customer/logout', [CustomerController::class, 'customer_logout'])->name('customer.logout');


// Cart routes
Route::middleware('customer')->group(function(){
    Route::get('/carts', [CartController::class, 'carts'])->name('carts');
    Route::get('/quantity/update', [CartController::class, 'quantity_update'])->name('quantity.update');
    Route::get('/carts/delete/{id}', [CartController::class, 'cart_delete'])->name('cart.delete');
    Route::post('/check-login', [CartController::class, 'checkLogin'])->name('check.login');
    Route::get('/add-to-cart/{id}', [CartController::class, 'addProductToCart'])->name('add.to.cart');
    Route::get('/carts/order/{id}', [CartController::class, 'cart_order'])->name('cart.order');
});






require __DIR__.'/auth.php';

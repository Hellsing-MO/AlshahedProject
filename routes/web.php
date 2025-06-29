<?php

use App\Http\Controllers\languageController;
use Illuminate\Support\Facades\Route;
use App\Services\SmartShippingService;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\StripePaymentController;

Route::get('/', [HomeController::class, 'home']);

Route::get('/dashboard', [HomeController::class, 'login_home'])
->middleware(['auth', 'verified'])->name('dashboard');;


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/checkout', [CheckoutController::class, 'showCheckoutForm'])->name('checkout.form');
    Route::post('/checkout', [CheckoutController::class, 'processCheckout'])->name('checkout.process');
    Route::get('/checkout/success', [CheckoutController::class, 'checkoutSuccess'])->name('checkout.success');
    Route::get('/checkout/cancel', [CheckoutController::class, 'checkoutCancel'])->name('checkout.cancel');
    Route::get('/shipping', [ShippingController::class, 'showShippingForm'])->name('shipping');
    Route::post('/shipping/calculate', [ShippingController::class, 'calculateShipping'])->name('shipping.calculate');
    Route::post('/shipping/checkout', [ShippingController::class, 'calculateShippingAndPay'])->name('shipping.checkout');
});

require __DIR__.'/auth.php';


Route::get('change', [languageController::class,'change'])->name('lang.change');

Route::get('admin/dashboard', [HomeController::class, 'index'])->
        middleware(['auth', 'admin']);

route::get('view_category', [AdminController::class, 'view_category'])->middleware(['auth', 'admin'] );

route::post('add_category', [AdminController::class, 'add_category'])->middleware(['auth', 'admin'] );

route::get('delete_category/{id}', [AdminController::class, 'delete_category'])->middleware(['auth', 'admin'] );

route::get('edit_category/{id}', [AdminController::class, 'edit_category'])->middleware(['auth', 'admin'] );

route::post('update_category/{id}', [AdminController::class, 'update_category'])->middleware(['auth', 'admin'] );


route::get('add_product', [AdminController::class, 'add_product'])->middleware(['auth', 'admin'] );

route::post('upload_product', [AdminController::class, 'upload_product'])->middleware(['auth', 'admin'] );


route::get('view_product', [AdminController::class, 'view_product'])->middleware(['auth', 'admin'] );

route::get('delete_product/{id}', [AdminController::class, 'delete_product'])->middleware(['auth', 'admin'] );


route::get('update_product/{id}', [AdminController::class, 'update_product'])->middleware(['auth', 'admin'] );

route::post('edit_product/{id}', [AdminController::class, 'edit_product'])->middleware(['auth', 'admin'] );

route::get('product_search/', [AdminController::class, 'product_search'])->middleware(['auth', 'admin'] );

route::get('about_us', [HomeController::class, 'about_us']);

route::get('our_shop', [HomeController::class, 'our_shop']);

route::get('category/{id}', [HomeController::class, 'category_products']);

route::get('product_details/{id}', [HomeController::class, 'product_details']);

route::get('add_cart/{id}', [HomeController::class, 'add_cart']);

route::get('delete_cart/{id}', [HomeController::class, 'delete_cart']);

route::get('mycart', [HomeController::class, 'mycart']);

Route::get('/api/products/category/{id}', [HomeController::class, 'getByCategory']);

Route::get('/api/products/all', [App\Http\Controllers\HomeController::class, 'getAllProducts']);


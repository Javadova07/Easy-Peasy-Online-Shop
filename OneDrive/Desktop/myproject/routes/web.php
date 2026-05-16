<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| PRODUCTS
|--------------------------------------------------------------------------
*/

Route::get('/products', [ProductController::class, 'index']);

Route::get('/products/{id}', [ProductController::class, 'show']);

/*
|--------------------------------------------------------------------------
| CART
|--------------------------------------------------------------------------
*/

Route::post('/cart/add/{id}', [ProductController::class, 'addToCart']);

Route::get('/cart', [ProductController::class, 'cart']);

Route::get('/cart/remove/{id}', [ProductController::class, 'removeFromCart']);

Route::get('/cart/increase/{id}', [ProductController::class, 'increaseQty']);

Route::get('/cart/decrease/{id}', [ProductController::class, 'decreaseQty']);

/*
|--------------------------------------------------------------------------
| ADDRESS
|--------------------------------------------------------------------------
*/

Route::get('/address', [ProductController::class, 'addressPage']);

Route::post('/save-address', [ProductController::class, 'saveAddress']);

/*
|--------------------------------------------------------------------------
| CHECKOUT
|--------------------------------------------------------------------------
*/

Route::get('/checkout', [ProductController::class, 'checkoutPage']);

Route::post('/checkout/pay', [ProductController::class, 'processPayment']);

/*
|--------------------------------------------------------------------------
| ORDERS
|--------------------------------------------------------------------------
*/

Route::get('/orders', [ProductController::class, 'orders']);

Route::get('/orders/{id}', [ProductController::class, 'orderDetail'])
    ->name('orders.show');

Route::get('/orders/{id}/paid', [ProductController::class, 'markAsPaid']);

/*
|--------------------------------------------------------------------------
| ADD PRODUCT
|--------------------------------------------------------------------------
*/

Route::get('/add-product', [ProductController::class, 'create']);

Route::post('/store-product', [ProductController::class, 'store']);
Route::get('/test', [ProductController::class, 'test']);
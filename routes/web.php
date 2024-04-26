<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(PagesController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('products/{category_slug?}', 'products')->name('products');
    Route::get('product/{slug}', 'product')->name('product');
    Route::get('file_name')->name('file_name'); 
    Route::get('cart', 'cart')->name('cart');

    Route::post('add_to_cart', 'addToCart')->name('add_to_cart');
    Route::post('delete_cart_item', 'deleteCartItem')->name('delete_cart_item');
    Route::post('delete_cart', 'deleteCart')->name('delete_cart');

    Route::post('checkout', 'checkout')->name('checkout');
    Route::get('confirmation/{order_id}', 'confirm')->name('confirmation');
});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

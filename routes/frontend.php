<?php

use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;

//HomePage
Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');

//allProduct
Route::get('/all/product', [FrontendController::class, 'allProduct'])->name('all.product');
//Product Details
Route::get('/product/{slug}', [FrontendController::class, 'productDetails'])->name('product.details');
//Best Selling
Route::get('/bestselling/product', [FrontendController::class, 'bestSellingProduct'])->name('bestselling.product');

//Team Section
Route::get('/team', [FrontendController::class, 'allTeam'])->name('all.team');
//Project Show
Route::get('/projects/{slug}', [FrontendController::class, 'projectShow'])->name('project.show');
//Contact Section
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::post('/contact-store', [FrontendController::class, 'contactStore'])->name('contact.store');

Route::controller(FrontendController::class)->group(function () {

    //AddToCartProductHome
    Route::post('/product-store-cart', 'AddToCartProductHome');

    Route::get('/product/mini/cart', 'AddMiniCart');
    Route::get('/minicart/product/remove/{rowId}','RemoveMiniCart');

    Route::get('/view-cart', 'viewCart')->name('view.cart');
    Route::get('/cart-increment/{rowId}', 'CartIncrement');
    Route::get('/cart-decrement/{rowId}', 'CartDecrement');

    //checkout
    Route::get('/checkout', 'checkout');

    // Route::get('/cart/remove/{rowId}', 'RemoveMiniCart')->name('cart.remove');

    //Add To Wishlist
    Route::post('/add-to-wishlist', 'AddToWishlist');
    Route::get('/wishlist-product', 'WishlistProduct')->name('wishlist.product');
    Route::get('/get-wishlist', 'GetWishlist');
    Route::get('/wishlist/product/remove/{rowId}', 'removeWishlist');

});

<?php

use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CmsController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserManagmentController;
use App\Http\Controllers\WishlistController;

Route::middleware(['webguard'])->group(function () {
    # Shop
    Route::prefix('shop')->group(function () {
        Route::get('', [ShopController::class, 'categories']);
        Route::get('cart', [ShopController::class, 'cart']);
        Route::get('order-now', [ShopController::class, 'orderNow']);
        // Route::pattern('pid', '\d+');
        Route::get('remove-item/{pid}', [ShopController::class, 'removeItem']);
        Route::delete('clear-cart', [ShopController::class, 'clearCart']);
        Route::post('add-to-cart', [ShopController::class, 'addToCart']);
        Route::put('update-cart', [ShopController::class, 'updateCart']);
        // Route::pattern('curl', '^[a-z\d-]+$');
        Route::get('{curl}', [ShopController::class, 'products']);
        // Route::pattern('purl', '^[a-z\d-]+$');
        Route::get('product/{purl}', [ShopController::class, 'item']);
        Route::get('product/search/{searchTerm}', [ShopController::class, 'searchProducts']);
    });

    # User
    Route::prefix('user')->group(function () {
        Route::middleware(['signedguard'])->group(function () {
            Route::get('signin', [UserController::class, 'getSignin']);
            Route::post('signin', [UserController::class, 'postSignin']);
            Route::get('signup', [UserController::class, 'getSignup']);
            Route::post('signup', [UserController::class, 'postSignup']);
        });
        Route::get('logout', [UserController::class, 'logout']);
        Route::middleware(['authguard'])->group(function () {
            Route::get('profile', [UserController::class, 'getProfile']);
            Route::put('profile', [UserController::class, 'putProfile']);
            Route::get('wishlist', [WishlistController::class, 'getWishlist']);
            Route::post('wishlist/add', [WishlistController::class, 'addToWishlist']);
            Route::delete('wishlist/del', [WishlistController::class, 'removeFromWishlist']);
            Route::delete('wishlist/clear', [WishlistController::class, 'clearCart']);
        });
    });

    Route::prefix('cms')->group(function () {
        Route::middleware(['cmsguard'])->group(function () {
            Route::get('dashboard', [CmsController::class, 'dashboard']);
            Route::get('menu', [CmsController::class, 'menu']);
            Route::get('orders', [CmsController::class, 'orders']);
            Route::delete('orders/{oid}', [CmsController::class, 'deleteOrder']);
            Route::resource('menu', MenuController::class);
            Route::resource('content', ContentController::class);
            Route::resource('categories', CategoriesController::class);
            Route::resource('products', ProductsController::class);
            Route::resource('users', UserManagmentController::class);
        });
    });

    # Pages
    Route::get('/', [PagesController::class, 'home']);
    Route::get('{url}', [PagesController::class, 'content']);
});
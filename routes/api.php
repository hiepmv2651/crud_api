<?php

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\UserCartsController;
use App\Http\Controllers\Api\ProductCartsController;
use App\Http\Controllers\Api\CategoryProductsController;
use App\Http\Controllers\Api\StripeController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\SendMailController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/exportUser', [ExportController::class, 'exportUser']);

Route::get('/exportCart/', [ExportController::class, 'exportCart']);

Route::get('/exportProduct', [ExportController::class, 'exportProduct']);

Route::get('/exportCategory', [ExportController::class, 'exportCategory']);

Route::get('/exportPdfCart/{id}', [ExportController::class, 'exportPdfCart']);

Route::post('/importUser', [ImportController::class, 'importUser']);

Route::post('/sendmail', [SendMailController::class, 'send_mail']);

Route::name('api.')->group(function () {
    // Route::get('/products', [ProductController::class, 'index'])->name('products.index');
});

Route::post(
    '/login',
    [AuthController::class, 'login'],

)->name('api.login');

Route::post('/register', [AuthController::class, 'register'])->name('api.register');


Route::middleware('auth:sanctum')
    ->get('/user', function (Request $request) {
        return $request->user();
    })
    ->name('api.user');

Route::name('api.')
    ->middleware('auth:sanctum')
    ->group(function () {
        Route::apiResource('carts', CartController::class);

        Route::apiResource('categories', CategoryController::class);

        // Category Products
        Route::get('/categories/{category}/products', [
            CategoryProductsController::class,
            'index',
        ])->name('categories.products.index');
        Route::post('/categories/{category}/products', [
            CategoryProductsController::class,
            'store',
        ])->name('categories.products.store');

        Route::apiResource('products', ProductController::class);

        // Product Carts
        Route::get('/products/{product}/carts', [
            ProductCartsController::class,
            'index',
        ])->name('products.carts.index');
        Route::post('/products/{product}/carts', [
            ProductCartsController::class,
            'store',
        ])->name('products.carts.store');

        Route::apiResource('users', UserController::class);

        // User Carts
        Route::get('/users/{user}/carts', [
            UserCartsController::class,
            'index',
        ])->name('users.carts.index');
        Route::post('/users/{user}/carts', [
            UserCartsController::class,
            'store',
        ])->name('users.carts.store');

        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        Route::post('stripe', [StripeController::class, 'stripePost']);

        Route::post('/editUserCart/{id}', [CartController::class, 'editUserCart'])->name('editUserCart');
    });

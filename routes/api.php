<?php

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->name('api.v1.')->group(function() {
   // Auth
    Route::prefix('auth')->name('auth.')
    ->controller(\App\Http\Controllers\Auth\AuthenticatedJwtController::class)->group(function () {
        Route::post('login', 'store')->name('login');
        Route::middleware('auth')->group(function () {
            Route::post('refresh', 'refresh')->name('refresh');
            Route::post('verify-token', 'verifyToken')->name('verifyToken');
            Route::post('logout', 'destroy')->name('logout');
        });
    });
    // Role
    Route::middleware('auth')->group(function () {
        Route::apiResource('users', \App\Http\Controllers\Api\V1\UserController::class);
        Route::apiResource('roles', \App\Http\Controllers\Api\V1\RoleController::class);
        Route::apiResource('permissions', \App\Http\Controllers\Api\V1\PermissionController::class)->only('index');
        Route::apiResource('warehouses', \App\Http\Controllers\APi\V1\WarehouseController::class);
        Route::apiResource('category', \App\Http\Controllers\Api\V1\CategoryController::class);
        Route::apiResource('order', \App\Http\Controllers\Api\V1\OrderController::class);
        Route::apiResource('orderdetail', \App\Http\Controllers\Api\V1\OrderDetailController::class);
        Route::apiResource('brand', \App\Http\Controllers\Api\V1\BrandController::class);
        Route::apiResource('images', \App\Http\Controllers\Api\V1\ImagesController::class);
        Route::apiResource('shipmethod', \App\Http\Controllers\Api\V1\ShipMethodController::class);
        Route::apiResource('product', \App\Http\Controllers\Api\V1\ProductController::class);
        Route::apiResource('payment-method', \App\Http\Controllers\Api\V1\PaymentMethodController::class);


        Route::get(
            'attributes/{attribute}/values',
            [\App\Http\Controllers\APi\V1\AttributeController::class, 'attributeValues']
        )->name('attributes.values');
        Route::apiResource('attributes', \App\Http\Controllers\APi\V1\AttributeController::class);
    });
});

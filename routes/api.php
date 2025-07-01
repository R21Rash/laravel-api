<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('testing', function () {
    return 'API Testing!!';
});

Route::apiResource('products', ProductController::class);

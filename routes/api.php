<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProductController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rutas API para productos
Route::apiResource('products', ProductController::class);

// Rutas adicionales para la API si las necesitas
Route::get('products/category/{category}', [ProductController::class, 'byCategory']);
Route::get('products/search/{query}', [ProductController::class, 'search']);
<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Display all products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Show the form to create a new product
Route::get('/product/create', [ProductController::class, 'create'])->name('products.create');


// Store a new product (after submitting the create form)
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// Show a specific product
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// Show the form to edit a product
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');

// Update a product (after submitting the edit form)
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');

// Delete a product
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');


// This is the route for the form submission from the welcome page
Route::post('/product/redirect', [ProductController::class, 'redirect'])->name('product.redirect');

require __DIR__.'/auth.php';

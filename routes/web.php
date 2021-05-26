<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', HomeController::class)->name('home');

Route::get('dashboard', DashboardController::class)->name('dashboard');

Route::resource('categories', CategoryController::class);

Route::get('categories/{category}', [CategoryController::class, 'showUser'])->name('categories.showUser');

Route::resource('products', ProductController::class);

Route::get('products/{product}', [ProductController::class, 'showUser'])->name('products.showUser');

/* Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
 */
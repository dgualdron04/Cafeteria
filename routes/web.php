<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FlavorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubcategoryController;
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

Route::resource('subcategories', SubcategoryController::class);

Route::resource('products', ProductController::class);

Route::get('products/{product}', [ProductController::class, 'showUser'])->name('products.showUser');

Route::resource('ingredients', IngredientController::class);

Route::resource('flavors', FlavorController::class);

Route::resource('brands', BrandController::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/gestion', [HomeController::class, 'showGestion'])->name('gestion');

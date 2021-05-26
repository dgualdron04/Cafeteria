<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke()
    {

        $categories = Category::all();
        $products = Product::all();

        return view('dashboard', compact('categories'), compact('products'));
    }
}

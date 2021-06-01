<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('home');
    }

    public function showGestion(){

        $categories = Category::all();

        $products = Product::all();

        return view('gestion', compact('products'), compact('categories'));
    }
}

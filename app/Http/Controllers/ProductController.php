<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Flavor;
use App\Models\Image;
use App\Models\Ingredient;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:products.index')->only('index');
        $this->middleware('can:products.create')->only('create');
        $this->middleware('can:products.store')->only('store');
        $this->middleware('can:products.edit')->only('edit');
        $this->middleware('can:products.update')->only('update');
        $this->middleware('can:products.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate(10);

        return view('products.index', compact('products'))->with('i', (request()->input('page', 1) - 1)* 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategories = Subcategory::all();

        $other = [Brand::all(), Flavor::all(), Ingredient::all()];

        return view('products.create', compact('subcategories'), compact('other'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'subcategories' => 'required',
            'brands' => 'required',
            'flavors' => 'required',
            'status' => 'required',
            'imagen' => 'required|image|max:2048'
        ]);

        $userId = Auth::id();

        $image = $request->imagen->store('products');

        $product = Product::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'price' => $request->price,
            'status' => $request->status,
            'user_id' => $userId,
            'subcategory_id' => $request->subcategories,
            'brand_id' => $request->brands,
            'flavor_id' => $request->flavors,
            'quantity' => $request->quantity
        ]);

        Image::create([
            'url' => $image,
            'imageable_id' => $product->id,
            'imageable_type' => Product::class,
        ]);

        $product->ingredients()->attach($request->ingredient);

        return redirect()->route('products.index')
            ->with('success', 'Categoria creada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function showUser(Product $product){
        if ($product->status == Product::PUBLICADO) {
            return view('products.showUser', compact('product'));
        } else {
            $category = Category::find($product->subcategory->category->id);
            return view('categories.showUser', compact('category'));
        }
       /*  return view('products.showUser', compact('product')); */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $other = [Subcategory::all(), Brand::all(), Flavor::all(), Ingredient::all()];

        return view('products.edit', compact('product'), compact('other'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'subcategories' => 'required',
            'brands' => 'required',
            'flavors' => 'required',
            'status' => 'required',
            'ingredient' => 'required'
        ]);

        $userId = Auth::id();

        if ($request->imagen != NULL) {
            $image = $request->imagen->store('products');
            $product->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'description' => $request->description,
                'price' => $request->price,
                'status' => $request->status,
                'user_id' => $userId,
                'subcategory_id' => $request->subcategories,
                'brand_id' => $request->brands,
                'flavor_id' => $request->flavors,
                'quantity' => $request->quantity
            ]);
            
            $product->images()->update([
                'url' => $image,
            ]);

            $product->ingredients()->update([
                'ingredient_id' => $request->ingredient,
            ]);
        } else {
            $product->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'description' => $request->description,
                'price' => $request->price,
                'status' => $request->status,
                'user_id' => $userId,
                'subcategory_id' => $request->subcategories,
                'brand_id' => $request->brands,
                'flavor_id' => $request->flavors,
                'quantity' => $request->quantity
            ]);

            $product->ingredients()->update([
                'ingredient_id' => $request->ingredient,
            ]);
        }

        return redirect()->route('products.index')
            ->with('success', 'Product edit.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Categoria creada exitosamente.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:subcategories.index')->only('index');
        $this->middleware('can:subcategories.create')->only('create');
        $this->middleware('can:subcategories.store')->only('store');
        $this->middleware('can:subcategories.edit')->only('edit');
        $this->middleware('can:subcategories.update')->only('update');
        $this->middleware('can:subcategories.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = Subcategory::orderBy('id', 'desc');

        $subcategoriesTotal = $subcategories->count();

        $subcategories = $subcategories->paginate(10);


        return view('subcategories.index', compact('subcategories'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('subcategories.create', compact('categories'));
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
            'categories' => 'required',
            'imagen' => 'required|image|max:2048'
        ]);

        $image = $request->imagen->store('subcategories');

        Subcategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'image' => $image,
            'category_id' => $request->categories,
        ]);
        
        return redirect()->route('subcategories.index')
            ->with('success', 'Se creo la subcategoria con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategory $subcategory)
    {
        return view('subcategories.show', compact('subcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategory $subcategory)
    {
        $categories = Category::all();

        return view('subcategories.edit', compact('subcategory'), compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        $request->validate([
            'name' => 'required',
            'categories' => 'required',
        ]);
        if ($request->imagen != NULL) {
            
            $image = $request->imagen->store('subcategories');
            $subcategory->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'image' => $image,
                'category_id' => $request->categories
            ]);

        } else {
            
            $subcategory->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'category_id' => $request->categories
            ]);

        }

        return redirect()->route('subcategories.index')
            ->with('success', 'Subcategory edit.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();

        return redirect()->route('subcategories.index')
            ->with('success', 'Subcategoria eliminada exitosamente.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:ingredients.index')->only('index');
        $this->middleware('can:ingredients.create')->only('create');
        $this->middleware('can:ingredients.store')->only('store');
        $this->middleware('can:ingredients.edit')->only('edit');
        $this->middleware('can:ingredients.update')->only('update');
        $this->middleware('can:ingredients.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingredients = Ingredient::orderBy('id', 'desc')->paginate(10);

        return view('ingredients.index', compact('ingredients'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ingredients/create');
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
        ]);

        Ingredient::create([
            'name' => $request->name,
        ]);

        return redirect()->route('ingredients.index')
            ->with('success', 'Flavor create successful.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingredient $ingredient)
    {
        return view('ingredients.edit', compact('ingredient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingredient $ingredient)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $ingredient->update([
            'name' => $request->name,
        ]);

        return redirect()->route('ingredients.index')
            ->with('success', 'Flavor edit.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingredient $ingredient)
    {
        $ingredient->delete();

        return redirect()->route('ingredients.index')
            ->with('success', 'Ingredient eliminada exitosamente.');
    }
}

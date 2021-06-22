<?php

namespace App\Http\Controllers;

use App\Models\Flavor;
use Illuminate\Http\Request;

class FlavorController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:flavors.index')->only('index');
        $this->middleware('can:flavors.create')->only('create');
        $this->middleware('can:flavors.store')->only('store');
        $this->middleware('can:flavors.edit')->only('edit');
        $this->middleware('can:flavors.update')->only('update');
        $this->middleware('can:flavors.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flavors = Flavor::orderBy('id', 'desc')->paginate(10);

        return view('flavors.index', compact('flavors'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('flavors/create');
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

        Flavor::create([
            'name' => $request->name,
        ]);

        return redirect()->route('flavors.index')
            ->with('success', 'Flavor create successful.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Flavor $flavor)
    {
        return view('flavors.edit', compact('flavor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Flavor $flavor)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $flavor->update([
            'name' => $request->name,
        ]);

        return redirect()->route('flavors.index')
            ->with('success', 'Flavor edit.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flavor $flavor)
    {
        $flavor->delete();

        return redirect()->route('flavors.index')
            ->with('success', 'Flavor eliminada exitosamente.');
    }
}

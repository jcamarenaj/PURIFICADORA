<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Productos::all();

        return Inertia::render(
            'Productos/Index',
            [
                'productos' => $productos
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render(
            'Productos/Create'
        );
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
            'prudcto' => 'required',
            'codigo' => 'required',
            'descripcion' => 'required'
        ]);
        Productos::create([
            'prudcto' => $request->prudcto,
            'codigo' => $request->codigo,
            'descripcion' => $request->descripcion
        ]);
        sleep(1);
        return redirect()->route('productos.index')->with('message', 'Productos Created Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Productos $productos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Productos  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit(Productos $productos)
    {
        return Inertia::render(
            'Productos/Edit',
            [
                'productos' => $productos
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Productos  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Productos $productos)
    {
        $request->validate([
            'prudcto' => 'required',
            'codigo' => 'required',
            'descripcion' => 'required'
        ]);

        $productos->prudcto = $request->prudcto;
        $productos->codigo = $request->codigo;
        $productos->descripcion = $request->descripcion;
        $productos->save();
        sleep(1);
        return redirect()->route('productos.index')->with('message', 'Book Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Productos  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Productos $productos)
    {
        $productos->delete();
        sleep(1);
        return redirect()->route('productos.index')->with('message', 'Book Delete Successfully');
    }
}

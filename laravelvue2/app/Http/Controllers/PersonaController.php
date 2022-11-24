<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas = Persona::all();

        return Inertia::render(
            'Personas/Index',
            [
                'personas' => $personas
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
            'Personas/Create'
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
            'name' => 'required',
            'age' => 'required',
            'telephone' => 'required'
        ]);
        Persona::create([
            'name' => $request->name,
            'age' => $request->age,
            'telephone' => $request->telephone
        ]);
        sleep(1);
        return redirect()->route('personas.index')->with('message', 'Persona Created Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona $persona)
    {
        return Inertia::render(
            'Personas/Edit',
            [
                'persona' => $persona
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'telephone' => 'required'
        ]);

        $persona->name = $request->name;
        $persona->age = $request->age;
        $persona->telephone = $request->telephone;
        $persona->save();
        sleep(1);
        return redirect()->route('personas.index')->with('message', 'Book Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        $persona->delete();
        sleep(1);
        return redirect()->route('personas.index')->with('message', 'Book Delete Successfully');
    }
}

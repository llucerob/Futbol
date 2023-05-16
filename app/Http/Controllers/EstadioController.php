<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estadio;


class EstadioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estadios = Estadio::all();

        return view('estadio.listar', ['estadios' => $estadios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('estadio.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $estadio    = new Estadio;

        $estadio->nombre        = $request->nombre;
        $estadio->capacidad     = $request->capacidad;


        $estadio->save();

        return redirect()->route('listar.estadio');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $estadio = Estadio::findOrFail($id);

        $estadio->delete();

        return redirect()->route('listar.estadio');
    }
}

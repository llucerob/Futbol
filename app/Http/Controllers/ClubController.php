<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;
use Illuminate\Support\Facades\Storage;
use App\Models\Serie;



class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clubs = Club::all();

        return view('club.listar', ['clubs' => $clubs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('club.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $club = new Club;

        $club->nombre           = $request->nombre;
        $club->f_fundacion      = $request->f_fundacion;
        if($request->file('insignia')){
            $ruta = Storage::disk('public')->put('insignias', $request->file('insignia'));
            $club->insignia     = $ruta;
        };

        $club->save();

        return redirect()->route('listar.club');
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
        $club = Club::findOrFail($id);
        $club->nombre           = $request->nombre;
        $club->f_fundacion      = $request->f_fundacion;
        if($request->file('insignia')){
            $ruta = Storage::disk('public')->put('insignias', $request->file('insignia'));
            $club->insignia     = $ruta;
        };

        $club->update();

        
        return redirect()->route('listar.club');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $club = Club::findOrFail($id);

        $club->delete();

        return redirect()->route('listar.club');
    }


public function agregarseries(string $id){

    $club = Club::findOrFail($id);

    $series = Serie::all();

    return view('club.series', ['club' => $club, 'series' => $series]);
}

public function serie(Request $request){

    //cargo el club
    $club = Club::findorFail($request->idclub);

    //primera serie

    if($request->serie0){

        $club->series()->attach(Serie::where('nombre', '1ª Serie')->first());
       

    }

    //segunda serie

    
    if($request->serie1){

        $club->series()->attach(Serie::where('nombre', '2ª Serie')->first());
       

    }

    //tercera serie

    
    if($request->serie2){

        $club->series()->attach(Serie::where('nombre', '3ª Serie')->first());
       

    }

    //serie senior
    
    if($request->serie3){

        $club->series()->attach(Serie::where('nombre', 'Serie Senior')->first());
       

    }



    return redirect()->route('listar.club');


}



}

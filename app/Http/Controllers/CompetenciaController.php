<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campeonato;
use App\Models\Club;
use App\Models\Rueda;
use App\Models\Fecha;
use App\Models\Partido;
use App\Models\Encuentro;
use Tonystore\LaravelRoundRobin\Services\RoundRobin;

class CompetenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $competencia = Campeonato::all();


        return view('competencia.listar', ['competencias' => $competencia]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clubs = Club::all();

        
        return view('competencia.crear', ['clubs' => $clubs]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        /*$schedule = new RoundRobin($request->clubs);
        $schedule->schedule();*/

       
        $campeonato  = new Campeonato;

        $campeonato->nombre         = $request->nombre;
        $campeonato->ruedas         = $request->ruedas;
        $campeonato->cantequipos    = count($request->clubs);

        $campeonato->tipo           = $request->tipo;

        $campeonato->save();


        $fechas = RoundRobin::addTeams($request->clubs)->schedule();

        //dd($schedule);

        //creacion cantidad de ruedas 

        for ($i=0; $i < $request->ruedas ; $i++) { 
            $rueda = new Rueda;
            $rueda->competencia_id = $campeonato->id; 
            $rueda->rueda   = $i + 1;
            $rueda->save();
        }

        //Organizacion fechas

        $nrueda = $campeonato->ruedas()->first();

        foreach($fechas as $key => $f){
            $fechita            = New Fecha;
            $fechita->rueda_id  = $nrueda->id;
            $fechita->fecha     = $key + 1;
            $fechita->save();
            foreach($f as $b => $encuentro){
                $encuentrito            = new Encuentro;
                $encuentrito->fecha_id  = $fechita->id;
                $encuentrito->encuentro = $b + 1;
                $encuentrito->save();
                $partido = new Partido;
                $partido->local         = $encuentro['local'];
                $partido->visita        = $encuentro['visitor'];
                $partido->encuentro_id  = $encuentrito->id;
                $partido->save();


            }

        }

        return redirect()->route('listar.competencia');

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
        //
    }
}

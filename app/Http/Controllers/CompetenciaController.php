<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campeonato;
use App\Models\Club;
use App\Models\Rueda;
use App\Models\Fecha;
use App\Models\Partido;
use App\Models\Encuentro;

class CompetenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $competencia = Campeonato::all();


        return view('competencia.listar', ['competencia' => $competencia]);
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
        
        $campeonato  = new Campeonato;

        $campeonato->nombre         = $request->nombre;
        $campeonato->ruedas         = $request->ruedas;
        $campeonato->cantequipos    = count($request->clubs);

        $campeonato->tipo           = $request->tipo;

        $campeonato->save();



        if($request->tipo == 'liga'){

            $clubs = [];

            foreach($request->clubs as $key => $c){
            $clubs[$key] = $c;
             }

        
            $partidos = [];

            foreach($clubs as $k){
	            foreach($clubs as $j){
		            if($k == $j){
			            continue;
		            }
		            $z = array($k,$j);
		            sort($z);
		            if(!in_array($z,$partidos)){
			            $partidos[] = $z;
		            }
	            }
            }


        }
        //creacion cantidad de ruedas 

        for ($i=0; $i < $request->ruedas ; $i++) { 
            $rueda = new Rueda;
            $rueda->competencia_id = $campeonato->id; 
            $rueda->rueda   = $i + 1;
            $rueda->save();
        }

        //creacion de fechas


        if ((count($request->clubs) % 2) == 0){

            $nfechas = count($request->clubs)-1;


        }else{

            $nfecha = count($request->clubs);

            $rueda = $campeonato->ruedas()->first();
            
           
                for ($i=0; $i < $nfecha ; $i++) { 
                    $fecha = new Fecha;
                    $fecha->rueda_id = $rueda->id;
                    $fecha->fecha = $i + 1;
    
                    $fecha->save();
    
                }


        }


        //creacion encuentros


        if ((count($request->clubs) % 2) == 0){





        }else{

            $fechainicial = $rueda->fechas()->first();

            $nencuentro = (count($request->clubs) - 1)/2;

            for ($i=0; $i < $nencuentro ; $i++) { 
                $encuentro = new Encuentro;
                $encuentro->fecha_id = $fechainicial->id;
                $encuentro->save();
            }

        }

        
       

        
        


        foreach($partidos as $p){
            $partido = new Partido;
            $partido->local = $p[0];
            $partido->visita = $p[1];
            $partido->save();
        }



        

        

        



        dd($fecha);
        



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

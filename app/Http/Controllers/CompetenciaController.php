<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campeonato;
use App\Models\Club;
use App\Models\Rueda;
use App\Models\Fecha;
use App\Models\Partido;
use App\Models\Encuentro;
use App\Models\Serie;
use App\Models\Estadio;
use App\Models\Resultado;
use App\Models\PartidoSerie;
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
        $clubs  = Club::all();
        $series = Serie::all();

        
        return view('competencia.crear', ['clubs' => $clubs, 'series' => $series]);

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

        $arr_serie = [];

        foreach($request->series as $key => $s){
            
            $s_competencia = Serie::findOrFail($s);

            $arr_serie[$key]['id']      = $s_competencia->id;
            $arr_serie[$key]['nombre']  = $s_competencia->nombre;

        }    

                
        $campeonato->series       = json_encode($arr_serie);
        $campeonato->cantequipos    = count($request->clubs);

        $campeonato->tipo           = $request->tipo;

        $campeonato->save();

        $numerito = 0;
        foreach($request->clubs as $r){
            $numerito = $numerito + $r;
        }


        $fechas = RoundRobin::addTeams($request->clubs)->schedule();

        //dd($schedule);

        //creacion cantidad de ruedas 

        
            $rueda = new Rueda;
            $rueda->competencia_id = $campeonato->id; 
            $rueda->rueda   = 1;
            $rueda->save();
      

        //Organizacion fechas


        foreach($fechas as $key => $f){
            $fechita            = New Fecha;
            $fechita->rueda_id  = $rueda->id;
            $fechita->fecha     = $key + 1;
            $fechita->save();
            $encompetencia = 0;
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
                $encompetencia = $encompetencia + $partido->local + $partido->visita;

                

                $encuentrito->estadio_id = $partido->elocal->estadio->id;
                $encuentrito->update();


            }

            $fechita->libre = $numerito - $encompetencia;
            $fechita->update();

        }

        //creacion resultados


        foreach($request->clubs as $club){
            foreach($request->series as $serie){

            $resultado = new Resultado;

            $resultado->competencia_id  = $campeonato->id;
            $resultado->serie_id        = $serie;
            $resultado->club_id         = $club;
            $resultado->save();
            
        
        
        
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


    public function verfechas($id){
        $competencia = Campeonato::findOrFail($id);

        $ruedas = $competencia->ruedas;

        //dd($fechas);

        return view('competencia.verfechas', ['ruedas' => $ruedas]);
    }

    public function programar(String $comp, String $fech){

        $fecha = Fecha::FindOrFail($fech);





        return view('competencia.programar', ['fecha' => $fecha, 'comp' => $comp, 'fech' => $fech]);
    }

    public function programapartido(String $id){
        $partido  = Partido::findOrfail($id);
        $estadios = Estadio::all();


    

        return view('competencia.programapartido', ['partido' => $partido, 'estadios' => $estadios]);
    }

    public function updatepartido(String $id, Request $request){
        $partido  = Partido::findOrfail($id);


        $partido->horario = $request->programacion;
        $partido->estado = 'Programado';
        $partido->update();

        $encuentro = Encuentro::findOrFail($partido->encuentro->id);

        $encuentro->estadio_id = $request->estadio;

        $encuentro->update();

        $fecha = $partido->encuentro->fecha_id;
        $competencia = $partido->encuentro->fecha->rueda->competencia_id;
    
            //informar que el partido esta programado 
        return redirect()->route('programar.encuentro', [$competencia, $fecha]);
    }

    public function verencuentros(String $comp, String $fech){


        $fecha = Fecha::FindOrFail($fech);
        

        




        return view('competencia.verencuentros', ['fecha' => $fecha, 'comp' => $comp, 'fech' => $fech]);       



    }


    public function cargarencuentro(Request $request){


        //dd($request->goles);

        foreach ($request->goles as $goles){
            $partido = Partido::findOrFail($goles['partidoid']);
            $serie = Serie::findOrFail($goles['serieid']);
            $partido->resultados()->attach($goles['serieid'],['nombreserie' => $serie->nombre, 'goleslocal' => $goles['local'], 'golesvisita' => $goles['visita']]);
            $partido->estado = 'Jugado';
            $partido->update();

            $resultadolocal = Resultado::where('competencia_id', $partido->encuentro->fecha->rueda->id)
                                    ->where('serie_id', $goles['serieid'])
                                    ->where('club_id',  $partido->elocal->id)
                                    ->first();

            $resultadovisita = Resultado::where('competencia_id', $partido->encuentro->fecha->rueda->id)
                                    ->where('serie_id', $goles['serieid'])
                                    ->where('club_id',  $partido->evisita->id)
                                    ->first();

            
            $resultadolocal->jugados = $resultadolocal->jugados + 1;
            $resultadovisita->jugados = $resultadovisita->jugados + 1;


            if($goles['local'] > $goles['visita']){
                $resultadolocal->ganados = $resultadolocal->ganados + 1;
                $resultadovisita->perdidos = $resultadovisita->perdidos + 1;

            }
            if($goles['local'] == $goles['visita']){
                $resultadolocal->empatados = $resultadolocal->empatados + 1;
                $resultadovisita->empatados = $resultadovisita->empatados + 1;

            }
            if($goles['local'] < $goles['visita']){
                $resultadolocal->perdidos = $resultadolocal->perdidos + 1;
                $resultadovisita->ganados = $resultadovisita->ganados + 1;

            }

            $resultadolocal->golesfavor         = $resultadolocal->golesfavor + $goles['local'];
            $resultadovisita->golesfavor        = $resultadovisita->golesfavor + $goles['visita'];


            $resultadolocal->golescontra        = $resultadolocal->golescontra + $goles['visita'];
            $resultadovisita->golescontra       = $resultadovisita->golescontra + $goles['local'];


            $resultadolocal->diferenciagoles    = $resultadolocal->golesfavor - $resultadolocal->golescontra;
            $resultadovisita->diferenciagoles   = $resultadovisita->golesfavor - $resultadovisita->golescontra;

            $resultadolocal->puntos     = ($resultadolocal->ganados)*3 + $resultadolocal->empatados;
            $resultadovisita->puntos    = ($resultadovisita->ganados)*3 + $resultadovisita->empatados;
            
            
            $resultadolocal->update();
            $resultadovisita->update();


        
        }





        return redirect()->back();

    }
    public function updateresultados(Request $request){


        //dd($request->goles);

        foreach ($request->goles as $goles){
            

            $partido = Partido::findOrFail($goles['partido_id']);


            $resultado = PartidoSerie::findOrFail($goles['resultado_id']);

            //dd($resultado);
            
            
            $resultadolocal = Resultado::where('competencia_id', $partido->encuentro->fecha->rueda->campeonato->id)
                                    ->where('serie_id', $resultado->serie_id)
                                    ->where('club_id',  $partido->elocal->id)
                                    ->first();

            $resultadovisita = Resultado::where('competencia_id', $partido->encuentro->fecha->rueda->id)
                                    ->where('serie_id', $resultado->serie_id)
                                    ->where('club_id',  $partido->evisita->id)
                                    ->first();

            
            $resultadolocal->jugados = $resultadolocal->jugados - 1;
            $resultadovisita->jugados = $resultadovisita->jugados - 1;


            if($resultado->goleslocal > $resultado->golesvisita){
                $resultadolocal->ganados = $resultadolocal->ganados - 1;
                $resultadovisita->perdidos = $resultadovisita->perdidos - 1;

            }
            if($resultado->goleslocal == $resultado->golesvisita){
                $resultadolocal->empatados = $resultadolocal->empatados - 1;
                $resultadovisita->empatados = $resultadovisita->empatados - 1;

            }
            if($resultado->goleslocal < $resultado->golesvisita){
                $resultadolocal->perdidos = $resultadolocal->perdidos - 1;
                $resultadovisita->ganados = $resultadovisita->ganados - 1;

            }

            $resultadolocal->golesfavor         = $resultadolocal->golesfavor - $resultado->goleslocal;
            $resultadovisita->golesfavor        = $resultadovisita->golesfavor - $resultado->golesvisita;


            $resultadolocal->golescontra        = $resultadolocal->golescontra - $resultado->golesvisita;
            $resultadovisita->golescontra       = $resultadovisita->golescontra - $resultado->goleslocal;


            $resultadolocal->diferenciagoles    = $resultadolocal->golesfavor - $resultadolocal->golescontra;
            $resultadovisita->diferenciagoles   = $resultadovisita->golesfavor - $resultadovisita->golescontra;

            $resultadolocal->puntos     = ($resultadolocal->ganados)*3 + $resultadolocal->empatados;
            $resultadovisita->puntos    = ($resultadovisita->ganados)*3 + $resultadovisita->empatados;
            
            
            $resultadolocal->update();
            $resultadovisita->update();


            $resultado->goleslocal   = $goles['local'];
            $resultado->golesvisita = $goles['visita'];
            $resultado->update();


            $resultadolocal->jugados = $resultadolocal->jugados + 1;
            $resultadovisita->jugados = $resultadovisita->jugados + 1;


            if($goles['local'] > $goles['visita']){
                $resultadolocal->ganados = $resultadolocal->ganados + 1;
                $resultadovisita->perdidos = $resultadovisita->perdidos + 1;

            }
            if($goles['local'] == $goles['visita']){
                $resultadolocal->empatados = $resultadolocal->empatados + 1;
                $resultadovisita->empatados = $resultadovisita->empatados + 1;

            }
            if($goles['local'] < $goles['visita']){
                $resultadolocal->perdidos = $resultadolocal->perdidos + 1;
                $resultadovisita->ganados = $resultadovisita->ganados + 1;

            }

            $resultadolocal->golesfavor         = $resultadolocal->golesfavor + $goles['local'];
            $resultadovisita->golesfavor        = $resultadovisita->golesfavor + $goles['visita'];


            $resultadolocal->golescontra        = $resultadolocal->golescontra + $goles['visita'];
            $resultadovisita->golescontra       = $resultadovisita->golescontra + $goles['local'];


            $resultadolocal->diferenciagoles    = $resultadolocal->golesfavor - $resultadolocal->golescontra;
            $resultadovisita->diferenciagoles   = $resultadovisita->golesfavor - $resultadovisita->golescontra;

            $resultadolocal->puntos     = ($resultadolocal->ganados)*3 + $resultadolocal->empatados;
            $resultadovisita->puntos    = ($resultadovisita->ganados)*3 + $resultadovisita->empatados;
            
            
            $resultadolocal->update();
            $resultadovisita->update();
            




        
        }





        return redirect()->back();

    }

    public function prueba(){
        $fecha = fecha::findOrFail(1);
        dd($fecha->encuentros->first()->partido->elocal->nombre);
    }
}

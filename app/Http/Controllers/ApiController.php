<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campeonato;
use App\Models\Resultado;

class ApiController extends Controller
{
    
    public function tabla(string $id){

        $campeonato = Campeonato::findOrFail($id);

        $arr = [];

       /* $resultados = Resultado::where('competencia_id', 2)
                                ->where('serie_id', 1)
                                ->orderBy('puntos', 'desc')
                                ->get();*/

        $series = json_decode($campeonato->series);
       //dd($campeonato->tabla->sortByDesc('puntos'));
        $arr['qty']  = $campeonato->cantequipos;

                

        foreach($series as $j => $s){
            $data = [];
            
            $i = 0;
            $arr[$j]['category']    = $s->nombre;
            $arr[$j]['msg']         = 'mensaje';

            $equipos = $campeonato->tabla->where('serie_id', $s->id)->sortByDesc('puntos');
            foreach($equipos as  $r){

                $data[$i]['pos']  = $i+1;
                $data[$i]['team'] = $r->club->nombrecorto;
                $data[$i]['j']    = $r->jugados;
                $data[$i]['g']    = $r->ganados;
                $data[$i]['e']    = $r->empatados;
                $data[$i]['p']    = $r->perdidos;
                $data[$i]['gf']   = $r->golesfavor;
                $data[$i]['ga']   = $r->golescontra;
                $data[$i]['gd']   = $r->diferenciagoles;
                $data[$i]['pts']  = $r->puntos;
                $i = $i+1;

            }

            $arr[$j]['data'] = $data; 




        }



       

        return ['status' => 1,
                'data' => $arr];
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Campeonato;

class ApiController extends Controller
{
    
    public function fechas(){

        //$campeonato = Campeonato::findOrFail(1);


        $data = [
            'posicion' => '1',
            'nombre'   => 'juanji',
            'goles'     => '3',
        ];


        

       

        return ['status' => 1,
                'data' => $data];
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Campeonato;
use App\Models\Evento;


class UtilsController extends Controller
{
    //


    public function dashboard(){



        $mensaje = Evento::all();




        //dd(json_encode($campeonato->tabla));




        return view('dashboard', ['mensajes' => $mensaje]);
    }


    public function storemensaje(Request $request){

        $mensaje = new Evento;

        $mensaje->titulo        = $request->titulo;
        $mensaje->subtitulo     = $request->subtitulo;
        $mensaje->nota          = $request->mensaje;
        $mensaje->horario       = $request->horario;

        $mensaje->save();



        return redirect()->route('dashboard');

                

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Campeonato;

class UtilsController extends Controller
{
    //


    public function dashboard(){



       $campeonato = Campeonato::findOrFail(2);



        //dd(json_encode($campeonato->tabla));




        return view('dashboard');
    }
}

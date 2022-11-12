<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use App\User;
use App\Peso;
use App\Nivel;
use App\Caloria;
use App\Ejercicio;
use App\Role;
use App\Rutina;
use Illuminate\Support\Facades\Hash;
use Log;

class CaloriasController extends Controller
{
    public function add_calories(Request $request){
        $user = $request->user();

        $caloria = new Caloria();

        $caloria->caloria = $request->caloria;
        $caloria->fk_user = $user->id;

        if($caloria->save()){
            return response()->json($caloria,200);
        }
        return response()->json("error al insertar",402);
    }



    public function get_all_user(Request $request){
        $user = $request->user();

        $calorias = Caloria::where('fk_user', $user->id)->get();

        return response()->json($calorias,200);
    }





    public function other(Request $request){

    }





}

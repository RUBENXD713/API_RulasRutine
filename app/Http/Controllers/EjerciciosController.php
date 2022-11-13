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
use App\Cuerpo;
use App\Tipo;
use Illuminate\Support\Facades\Hash;
use Log;

class EjerciciosController extends Controller
{
    public function add_exercise(Request $request){
        $ejercicio = new Ejercicio();
        $ejercicio->name = $request->name;
        $ejercicio->description = $request->description;
        $ejercicio->url = $request->url;
        $ejercicio->status = 1;

        if($ejercicio->save()){
            return response()->json("datos almacenados de manera exitosa",200);
        }

        return response()->json("error al insertar en la base de datos", 402);
    }



    public function get_one(Request $request, $id){
        $ejercicio = Ejercicio::find($id);

        return response()->json($ejercicio,200);
    }


    public function get_all(Request $request){
        $ejercicio = Ejercicio::all();

        return response()->json($ejercicio,200);
    }


    public function get_all_enabled(Request $request){
        $ejercicio = Ejercicio::where("status",1)->get();

        return response()->json($ejercicio,200);
    }


    public function get_all_disabled(Request $request){
        $ejercicio = Ejercicio::where("status",0)->get();

        return response()->json($ejercicio,200);
    }




    public function update_ejercise(Request $request,$id){
        $ejercicio = Ejercicio::find($id);

        $ejercicio->name = $request->name;
        $ejercicio->description = $request->description;
        $ejercicio->url = $request->url;

        if ($ejercicio->save()){
            return response()->json("datos actualizados de manera exiosa",200);
        }
        return response()->json("error al insertar en la base de datos",402);
    }    




    public function disable(Request $request, $id){
        $ejercicio = Ejercicio::find($id);

        $ejercicio->status = 0;

        if($ejercicio->save()){
            return response()->json(["Dato_deshabilitado : "=>$ejercicio],200);
        }
        return response()->json("El regitro NO se ah podido deshabilitar",402);
    }



    public function enable(Request $request, $id){
        $ejercicio =Ejercicio::find($id);

        $ejercicio->status = 1;

        if($ejercicio->save()){
            return response()->json(["Dato_habilitado : "=>$ejercicio],200);
        }
        return response()->json("El regitro NO se ah podido habilitar",402);
    }

    
}

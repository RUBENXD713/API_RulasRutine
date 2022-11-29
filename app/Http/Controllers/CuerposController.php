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

class CuerposController extends Controller
{
    public function get_all(Request $request){
        return response()->json(Cuerpo::all());
    }



    public function get_one(Request $request,$id){
        $cuerpo = Cuerpo::find($id);

        return response()->json($cuerpo,200);
    }



    public function update(Request $request,$id){
        $cuerpo = Cuerpo::find($id);

        $cuerpo->name = $request->name;

        if($cuerpo->save()){
            return response()->json("Datos actualizados de manera exitosa",200);
        }

        return response()->json("Error al actualizar los datos en la base de datos",402);
    }



    public function disable(Request $request, $id){
        $cuerpo = Cuerpo::find($id);

        $cuerpo->status = 0;

        if($cuerpo->save()){
            return response()->json(["Dato_deshabilitado : "=>$cuerpo],200);
        }
        return response()->json("El regitro NO se ah podido deshabilitar",402);
    }



    public function enable(Request $request, $id){
        $cuerpo = Cuerpo::find($id);

        $cuerpo->status = 1;

        if($cuerpo->save()){
            return response()->json(["Dato_habilitado : "=>$cuerpo],200);
        }
        return response()->json("El regitro NO se ah podido habilitar",402);
    }



    public function delete(Request $request,$id){

        return response()->json();
    }
}

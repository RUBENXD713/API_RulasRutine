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

class NivelesController extends Controller
{

    
    public function get_levels(Request $request)
    {
            $niveles = Nivel::all();
            return response()->json($niveles,200);
    }




    public function get_level(Request $request, $id)
    {
            $nivel = Nivel::find($id);
            return response()->json($nivel,200);
    }
    


    public function update_level(Request $request, $id){
        $nivel = Nivel::find($id);

        $nivel->name = $request->name;
        $nivel->description = $request->description;
        $nivel->minExp = $request->minExp;
        $nivel->maxExp = $request->maxExp;

        if($nivel->save()){
            return response()->json(["datos_actualizados : "=>$nivel],200);
        }
        return response()->json("Error al actualizar los datos",402);
    }



    public function disable(Request $request, $id){
        $nivel = Nivel::find($id);

        $nivel->status = 0;

        if($nivel->save()){
            return response()->json(["Dato_deshabilitado : "=>$nivel],200);
        }
        return response()->json("El regitro NO se ah podido deshabilitar",402);
    }



    public function enable(Request $request, $id){
        $nivel = Nivel::find($id);

        $nivel->status = 1;

        if($nivel->save()){
            return response()->json(["Dato_habilitado : "=>$nivel],200);
        }
        return response()->json("El regitro NO se ah podido habilitar",402);
    }


    public function get_user_level(Request $request){
        $user = $request->user();

        $nivel = Nivel::where('minExp','<=',$user->experience)->where('maxExp','>=',$user->experience)->get();

        return response()->json(["user_experience"=>$user->experience,
        "nivel_name"=>$nivel[0]->name,"nivel_minExp"=>$nivel[0]->minExp,
        "nivel_maxExp"=>$nivel[0]->maxExp]);
    }
    
}

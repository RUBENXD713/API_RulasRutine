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

class PesosController extends Controller
{
    public function add_weight(Request $request){
        $peso = new Peso();
        $user = $request->user();

        $peso->peso = $request->peso;
        $peso->fk_user = $user->id;

        if($peso->save()){
            return response()->json(["Datos Registrados"=>$peso]);
        }
        return response()->json("Error al insertar en la base de datos",400);
    }


    public function get_first_last_weight(Request $request){
        $user = $request->user();
        $first_peso = DB::table('pesos')->where('fk_user', $user->id)->first();
        $last_peso = DB::table('pesos')->where('fk_user', $user->id)->orderBy('id','DESC')->first();

        return response()->json(["last: " =>  $last_peso->peso,
        "first: " => $first_peso->peso,
        "perdio: " => ($first_peso->peso - $last_peso->peso)]);
    }



    public function index_weight(Request $request){
        $user = $request->user();
        $pesos=Peso::where('fk_user', $user->id)->get();

        return response()->json($pesos);
    }



    public function delete_weight(Request $request, $id){
        $user = $request->user();

        $peso = Peso::where('fk_user', $user->id)->where('id',$id)->get();

        Peso::destroy($id);

        return response()->json(["Datos Eliminados"=>$peso]);

    }

    
}

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

class RutinasController extends Controller
{



    
    public function add_rutine(Request $request){
        $rutina = new Rutina();

        $rutina->fk_nivel = $request->fk_nivel;
        $rutina->fk_ejercicio = $request->fk_ejercicio;
        $rutina->fk_cuerpo = $request->fk_cuerpo;
        $rutina->fk_tipo = $request->fk_tipo;
        $rutina->series = $request->series;
        $rutina->repetitions = $request->repetitions;
        $rutina->calorias = $request->calorias;
        $rutina->status = 1;

        if($rutina->save()){
            return response()->json(['datos almacenados'=>$rutina] , 200);
        }

        return response()->json("error al insertar",402);
    }





    public function get_one(Request $request, $id){
        $rutinas = DB::table('rutinas')->join('ejercicios', 'rutinas.fk_ejercicio', '=', 'ejercicios.id')
                                       ->join('niveles', 'rutinas.fk_nivel','=','niveles.id')
                                                                            ->where('rutinas.id',$id)
                                                                            ->select('ejercicios.*','rutinas.*','niveles.*')
                                                                            ->get();
        return response()->json($rutina,200);
    }






    public function get_all(Request $request){
        $rutinas = DB::table('rutinas')->join('ejercicios', 'rutinas.fk_ejercicio', '=', 'ejercicios.id')
                                       ->join('niveles', 'rutinas.fk_nivel','=','niveles.id')
                                       ->join('tipos', 'rutinas.fk_tipo','=','tipos.id')
                                       ->join('cuerpos', 'rutinas.fk_cuerpo','=','cuerpos.id')
                                                                            ->select(
                                                                            'ejercicios.name as name_exercise',
                                                                            'rutinas.series as series','rutinas.repetitions as repetitions','rutinas.calorias as calorias',
                                                                            'cuerpos.name as name_cuerpo',
                                                                            'tipos.name as name_tipo',
                                                                            'niveles.name as name_level')
                                                                            ->get();
         return response()->json($rutinas,200);
    }







    public function update(Request $request, $id){
        $rutina =  Rutina::find($id);

        $rutina->fk_nivel = $request->fk_nivel;
        $rutina->fk_ejercicio = $request->fk_ejercicio;
        $rutina->fk_cuerpo = $request->fk_cuerpo;
        $rutina->fk_tipo = $request->fk_tipo;
        $rutina->series = $request->series;
        $rutina->repetitions = $request->repetitions;
        $rutina->calorias = $request->calorias;

        if($rutina->save()){
            return response()->json('datos actualizados ' , 200);
        }

        return response()->json("error al insertar",402);
    }







    public function make_rutine(Request $request){

        $user = $request->user();

        $nivel = Nivel::where('minExp','<=',$user->experience)->where('maxExp','>=',$user->experience)->get();


        $rutinas = DB::table('rutinas')->join('ejercicios', 'rutinas.fk_ejercicio', '=', 'ejercicios.id')
                                                                            ->where('rutinas.fk_nivel',$nivel->id)
                                                                            ->where('rutinas.fk_cuerpo',$request->fk_cuerpo)
                                                                            ->where('rutinas.fk_tipo', $request->fk_tipo)
                                                                            ->inRandomOrder()
                                                                            ->limit(10)
                                                                            ->select('ejercicios.*','rutinas.series','rutinas.repetitions','rutinas.calorias')
                                                                            ->get();
                                                                
        return response()->json($rutinas);
    }

}

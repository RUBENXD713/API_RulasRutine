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

class UsersController extends Controller
{

    //Registro de usuarios, por medio de jsonData.

    public function sign_in(Request $request)
    {
        //validadcion de campos requeridos en el usuario.
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
            'name'=>'required',
        ]);

        $user = new User();
        $user->name=$request->name;
        $user->lastName=$request->lastName;
        $user->age=$request->age;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->experience=1;
        $user->fk_roll=1;

        //validad el estado de la funcion save en la base de datos.
        if($user->save()){
            return response()->json($user);
             return response()->json(202,"Usuario registrado con EXITO");
        }
        //error al moemnto de insertar dentro de la base de datos.
        return abort(402, "Error al registrar Usuario");
    }




    //Destruccion del token y la session del usuario
    public function log_out(Request $request)
    {
        //Destruccion del token.
        return response()->json(["destroyed" => $request->user()->tokens()->delete()],200);
    }



    //Logeo de los usuarios con correo y contraseña
    public function log_in(Request $request)
    {
        //validacion de la entrada de los campos necesarios.
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);
        $user=User::where('email',$request->email)->first();

        //compronacion de la contraseña
        if(!$user || !Hash::check($request->password, $user->password)){
            throw ValidationException::withMessages([
                'email|password'=>['Datos Incorrectos']
            ]);
        }

        //creacion del token de usuario
        $token = $user->createToken($request->email)->plainTextToken;
        
        return response()->json(["token"=>$token],201);
    }



    //recupera la informacion del usuario, con fin de generar estadisticas.
    public function perfil(Request $request)
    {
        if($request->user())
        {
            return response()->json(['Perfil'=>$request->user()],200);
        }    
        return abort(400,"Error al intentar recuperar tu informacion!!");
    }



    //actualizacion completal perfil de usuario
    public function update_profile(Request $request)
    {
        $user=$request->user();

        $user->name = $request->name;
        $user->lastName = $request->lastName;
        $user->age = $request->age;
        $user->email = $request->email;
        //$user->password=Hash::make($request->password);
        //$user->fk_roll=$request->fk_roll;  
        if($user->save()){
        return response()->json(["Datos actualizados en: "=>$user]);
        }
        return response()->json("Algo salio mal",400);  
    }



    //actualizacion completa de un usaurio con id
    public function update_User(Request $request,$id)
    {
        $user=User::find($id);

        $user->name = $request->name;
        $user->lastName = $request->lastName;
        $user->age = $request->age;
        $user->email = $request->email;
        $user->experience = $request->experience;
        //$user->password=Hash::make($request->password);
        $user->fk_roll=$request->fk_roll;  
        if($user->save()){
        return response()->json(["Datos actualizados en: "=>$user]);
        }
        return response()->json("Algo salio mal",400);  
    }



    public function change_password(Request $request)
    {
        $user=$request->user();

        if(!$user || !Hash::check($request->password, $user->password)){
            throw ValidationException::withMessages([
                'password'=>['La contraseña no coincide']
            ]);
        }

        $user->password=Hash::make($request->new_password);

        if($user->save()){
        return response()->json(["Datos actualizados en: "=>$user]);
        }
        return response()->json("Algo salio mal",400);  
    }


    //Subir de nivel a un usuario cada que tenga una rutina concluida
    public function level_up(Request $request){

        $user = $request->user();
        //echo $user;

        $user->experience = $user->experience + 20;

        if($user->save()){
            return response()->json("level UP!!",202);
        }
        return response()->json("algo salio mal",400);
    }



    public function get_all(Request $request){
        $users = User::all();
        return response()->json($users,201);
    }


}

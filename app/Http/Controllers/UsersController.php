<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use App\User;
use Illuminate\Support\Facades\Hash;
use Log;

class UsersController extends Controller
{
    public function sign_in(Request $request)
    {
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

        if($user->save()){
             return response()->json(202,"Usuario registrado con EXITO");
        }

        return abort(402, "Error al registrar Usuario");
    }
}

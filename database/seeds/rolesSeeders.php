<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class rolesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' =>'Cliente',
            'description'=>'Usuario con permisos basicos, capaz de generar rutinas de manera dinamica',
            'status' =>1,
        ]);

        DB::table('roles')->insert([
            'name' =>'Entrenador',
            'description'=>'Usuario con permisos medios, capaz de generar nuevos ejercicios, y dar un mayor dinamismo a las rutinas',
            'status' =>1,
        ]);

        DB::table('roles')->insert([
            'name' =>'Administrador',
            'description'=>'Usuario con altos privilegios, capaz de administrar todo dentro de la aplicacion',
            'status' =>1,
        ]);
    }
}

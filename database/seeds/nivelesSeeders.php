<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class nivelesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('niveles')->insert([
            'name' =>"nuevo",
            'description'=>"Este nivel se asigna a usuarios recientemente registrados.",
            'status' =>1,
            'minExp'=>1,
            'maxExp'=>49,
        ]);

        DB::table('niveles')->insert([
            'name' =>"novato",
            'description'=>"Este nivel se asigna a usuarios con experiencia muy basica.",
            'status' =>1,
            'minExp'=>50,
            'maxExp'=>99,
        ]);

        DB::table('niveles')->insert([
            'name' =>"principiante",
            'description'=>"Este nivel de experiencia bajo.",
            'status' =>1,
            'minExp'=>100,
            'maxExp'=>149,
        ]);

        DB::table('niveles')->insert([
            'name' =>"avanzado",
            'description'=>"Este nivel se asigna a usuarios con una buena condicion fisica.",
            'status' =>1,
            'minExp'=>150,
            'maxExp'=>199,
        ]);

        DB::table('niveles')->insert([
            'name' =>"Experto",
            'description'=>"Este nivel se asigna a usuarios con gran experiencia en el uso de las rutinas generadas en la aplicacion.",
            'status' =>1,
            'minExp'=>200,
            'maxExp'=>249,
        ]);

        DB::table('niveles')->insert([
            'name' =>"Maximus",
            'description'=>"Este nivel se asigna a usuarios con el nivel mas alto en la aplicacion",
            'status' =>1,
            'minExp'=>250,
            'maxExp'=>99999999,
        ]);
    }
}

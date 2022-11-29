<?php

use Illuminate\Database\Seeder;

class tiposSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos')->insert([
            'name' =>"Aumento",
            'status' =>1,
        ]);
        DB::table('tipos')->insert([
            'name' =>"Definir",
            'status' =>1,
        ]);
        DB::table('tipos')->insert([
            'name' =>"Quemar",
            'status' =>1,
        ]);
        DB::table('tipos')->insert([
            'name' =>"Cardio",
            'status' =>1,
        ]);
    }
}

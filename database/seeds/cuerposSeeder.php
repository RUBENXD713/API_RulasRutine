<?php

use Illuminate\Database\Seeder;

class cuerposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cuerpos')->insert([
            'name' =>"Pierna",
            'status' =>1,
        ]);
        DB::table('cuerpos')->insert([
            'name' =>"Espalda",
            'status' =>1,
        ]);
        DB::table('cuerpos')->insert([
            'name' =>"Brazo",
            'status' =>1,
        ]);
        DB::table('cuerpos')->insert([
            'name' =>"Antebrazo",
            'status' =>1,
        ]);
        DB::table('cuerpos')->insert([
            'name' =>"Pecho",
            'status' =>1,
        ]);
        DB::table('cuerpos')->insert([
            'name' =>"Tobillo",
            'status' =>1,
        ]);
        DB::table('cuerpos')->insert([
            'name' =>"Bicep",
            'status' =>1,
        ]);
        DB::table('cuerpos')->insert([
            'name' =>"Tricep",
            'status' =>1,
        ]);
        DB::table('cuerpos')->insert([
            'name' =>"Abdomen",
            'status' =>1,
        ]);
        DB::table('cuerpos')->insert([
            'name' =>"Hombro",
            'status' =>1,
        ]);
        DB::table('cuerpos')->insert([
            'name' =>"Gluteo",
            'status' =>1,
        ]);

    }
}

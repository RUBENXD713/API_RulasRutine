<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(nivelesSeeders::class);
        $this->call(rolesSeeders::class);
        $this->call(cuerposSeeder::class);
        $this->call(tiposSeeders::class);
    }
}

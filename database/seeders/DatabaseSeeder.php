<?php

namespace Database\Seeders;

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

        /* $this->call(elevesSeeder::class); */

        /* $this->call(ensSeeder::class); */

        /* $this->call(classeSeeder::class); */

        /* $this->call(matiereSeeder::class); */

       /*  $this->call(salleSeeder::class); */

       $this->call(affEnsSeeder::class);

        /* $this->call(seanceSeeder::class); */
    }
}

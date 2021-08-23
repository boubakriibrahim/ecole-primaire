<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Salle;

class salleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Salle::factory()->count(40)->create();
    }
}

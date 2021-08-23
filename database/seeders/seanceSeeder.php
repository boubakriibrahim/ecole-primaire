<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Seance;

class seanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Seance::factory()->count(30)->create();
    }
}

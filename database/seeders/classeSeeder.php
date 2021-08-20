<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Classe;

class classeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Classe::factory()->count(50)->create();
    }
}

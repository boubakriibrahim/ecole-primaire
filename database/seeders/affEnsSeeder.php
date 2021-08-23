<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\aff_enseignant;

class affEnsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        aff_enseignant::factory()->count(50)->create();
    }
}

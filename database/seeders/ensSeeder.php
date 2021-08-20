<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\enseignant;

class ensSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<50;$i++) {
            enseignant::factory()->count(1)->create();
        }
    }
}

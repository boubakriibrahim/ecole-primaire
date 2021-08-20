<?php

namespace Database\Factories;

use App\Models\Seance;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;
use Illuminate\Support\Carbon;

class seanceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Seance::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $hour = rand(8,18);
        $minits = rand(0,1);
        if ($hour < 10){
            $time = '0'.$hour.':'.($minits * 3).'0:00';
        } else {
            $time = $hour.':'.($minits * 3).'0:00';
        }


        return [
            'jour' => $this->faker->numberBetween(1,6),
            'libelle' => $this->faker->name(),
            'jour' => $this->faker->numberBetween(1,6),
        ];
    }
}

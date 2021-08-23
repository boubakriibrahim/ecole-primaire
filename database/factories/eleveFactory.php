<?php

namespace Database\Factories;

use App\Models\eleve;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;
use Illuminate\Support\Carbon;

class eleveFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = eleve::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $year = rand(2008, 2017);
        $month = rand(1, 12);
        $day = rand(1, 28);

        $date = Carbon::create($year,$month ,$day , 0, 0, 0);
        return [
            'nom' => $this->faker->name(),
            'prenom' => $this->faker->name(),
            'date_naissance' => $date->format('Y-m-d'),
            'num_inscri' => $this->faker->numberBetween(1111111,9999999),
            'sexe' => rand(0,1),
        ];
    }
}

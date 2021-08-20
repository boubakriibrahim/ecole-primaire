<?php

namespace Database\Factories;

use App\Models\Classe;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;
use Illuminate\Support\Carbon;

class classeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Classe::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $annee = $this->faker->numberBetween(2019,2022);

        return [
            'nom' => $this->faker->name(),
            'niveau' => $this->faker->numberBetween(1,6),
            'nb' => $this->faker->numberBetween(20,40),
            'anneescolaire' => $annee.'-'.($annee+1),
        ];
    }
}

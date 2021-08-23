<?php

namespace Database\Factories;

use App\Models\Seance;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;
use Illuminate\Support\Carbon;
use App\Models\enseignant;
use App\Models\Classe;
use App\Models\Matiere;
use App\Models\Salle;



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

        $hour = rand(8,17);
        $minits = rand(0,1);
        if ($hour < 10){
            $time_debut = '0'.$hour.':'.($minits * 3).'0:00';
        } else {
            $time_debut = $hour.':'.($minits * 3).'0:00';
        }



            do {

                $hour2 = rand(8,18);
                $minits2 = rand(0,1);

            } while(($hour2 < $hour) || (($hour2 == $hour) && ($minits2 <= $minits)));

            if ($hour2 < 10){
                $time_fin = '0'.$hour2.':'.($minits2 * 3).'0:00';
            } else {
                $time_fin = $hour2.':'.($minits2 * 3).'0:00';
            }


        $enseignants = enseignant::get()->count();
        $classes = Classe::get()->count();
        $matieres = Matiere::get()->count();
        $salles = Salle::get()->count();

        $annee = $this->faker->numberBetween(2019,2022);


        return [
            'jour' => $this->faker->numberBetween(1,6),
            'heure_debut' => $time_debut,
            'heure_fin' => $time_fin,
            'id_enseignant' => rand(1,$enseignants),
            'id_classe' => rand(1,$classes),
            'id_matiere' => rand(1,$matieres),
            'id_salle' => rand(1,$salles),
            'anneescolaire' => $annee.'-'.($annee+1),
        ];
    }
}

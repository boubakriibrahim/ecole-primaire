<?php

namespace Database\Factories;

use App\Models\enseignant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;
use Illuminate\Support\Carbon;

class enseignantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = enseignant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $nom = $this->faker->name();
        $prenom = $this->faker->name();
        $login = $this->faker->unique()->safeEmail();

        $num = rand(0, 1);
        $sexe = ['مذكر','مؤنث'];
        $sexeNum = $sexe[$num];

        $year = rand(1960, 1998);
        $month = rand(1, 12);
        $day = rand(1, 28);

        $date = Carbon::create($year,$month ,$day , 0, 0, 0);

        $user = new User();
        $user->nom = $nom;
        $user->prenom = $prenom;
        $user->role = 'enseignant';
        $user->email = $login;
        $user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        $user->date_naissance = $date->format('Y-m-d');
        $user->adresse = $this->faker->address;
        $user->phone = $this->faker->numberBetween(22222222,99999999);

        $ens_id = enseignant::get()->count()+1;
        $user->id_enseignant = $ens_id;

        $user->save();

        return [
            'nom' => $nom,
            'prenom' => $prenom,
            'login' => $login,
            'sexe' => $sexeNum,
        ];
    }
}

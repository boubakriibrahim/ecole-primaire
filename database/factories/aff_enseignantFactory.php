<?php

namespace Database\Factories;

use App\Models\aff_enseignant;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;
use Illuminate\Support\Carbon;
use App\Models\Classe;
use App\Models\enseignant;
use Illuminate\Support\Facades\DB;

class aff_enseignantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = aff_enseignant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $enseignants = DB::table('enseignants')->get();
        $classes = DB::table('classes')->get();


        $idsEnseignants = array();
        foreach($enseignants as $key => $enseignant){
            array_push($idsEnseignants,$enseignant->id);
        }



        $idClassesMatieres = [];
        foreach($classes as $key => $classe) {
            $niveau = $classe->niveau;
            $matieres = DB::table('matieres')->where('niveau', $niveau)->get();

            foreach($matieres as $key => $matiere){
                $affectations = DB::table('aff_enseignants')->where('classe_id', $classe->id)->where('matiere_id', $matiere->id)->get()->count();
                if ($affectations == 0){
                    array_push($idClassesMatieres,[$classe->id,$matiere->id]);
                }
            }
        }



        if(empty($idClassesMatieres)){
            return ;
        }

        $keyEns = array_rand($idsEnseignants);
        $enseignant_id = $idsEnseignants[$keyEns];

        $keyClassMat = array_rand($idClassesMatieres);
        $classe_id = $idClassesMatieres[$keyClassMat][0];
        $matiere_id = $idClassesMatieres[$keyClassMat][1];



        return [
            'classe_id' => $classe_id,
            'matiere_id' => $matiere_id,
            'enseignant_id' => $enseignant_id,
        ];
    }
}

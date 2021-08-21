<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seances', function (Blueprint $table) {

            $table->id();
            $table->integer('jour');
            $table->time('heure_debut');
            $table->time('heure_fin');
            $table->unsignedBigInteger('id_enseignant');
            $table->unsignedBigInteger('id_classe');
            $table->unsignedBigInteger('id_matiere');
            $table->unsignedBigInteger('id_salle');
            $table->string('anneescolaire');

            $table->foreign("id_enseignant")->references('id')->on('enseignants')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign("id_classe")->references('id')->on('classes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign("id_matiere")->references('id')->on('matieres')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign("id_salle")->references('id')->on('salles')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seances');
    }
}

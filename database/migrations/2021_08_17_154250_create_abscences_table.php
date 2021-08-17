<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbscencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abscences', function (Blueprint $table) {
            $table->id();
            $table->date('jour');
            $table->time('heure_debut');
            $table->time('heure_fin');
            $table->unsignedBigInteger("eleve_id");
            $table->string('anneescolaire');
           // $table->timestamps();

            $table->foreign("eleve_id")->references('id')->on('eleves')->onUpdate('cascade')->onDelete('cascade')->constained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abscences');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmploisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emplois', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_classe');
            $table->unsignedBigInteger('id_enseignant');
            $table->string('anneescolaire');
            $table->foreign("id_classe")->references('id')->on('classes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign("id_enseignant")->references('id')->on('enseignants')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign("anneescolaire")->references('anneescolaire')->on('classes')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emplois');
    }
}

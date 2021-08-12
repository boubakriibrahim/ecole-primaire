<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffEnseignantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aff_enseignants', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("classe_id");
            $table->unsignedBigInteger("enseignant_id");
            $table->unsignedBigInteger("matiere_id");
            $table->foreign("classe_id")->references('id')->on('classes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign("enseignant_id")->references('id')->on('enseignants')->onUpdate('cascade')->onDelete('cascade')->constained();
            $table->foreign("matiere_id")->references('id')->on('matieres')->onUpdate('cascade')->onDelete('cascade');
        });
        //schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aff_enseignants');
    }
}

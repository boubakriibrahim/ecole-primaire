<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("eleve_id");
            $table->unsignedBigInteger("classe_id");
            $table->unsignedBigInteger("matiere_id");
            $table->integer('note');
            $table->foreign("classe_id")->references('id')->on('classes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign("eleve_id")->references('id')->on('eleves')->onUpdate('cascade')->onDelete('cascade')->constained();
            $table->foreign("matiere_id")->references('id')->on('matieres')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
    }
}

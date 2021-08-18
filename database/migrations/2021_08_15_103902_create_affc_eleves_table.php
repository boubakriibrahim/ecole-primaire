<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAffcElevesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affc_eleves', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("classe_id");
            $table->unsignedBigInteger("eleve_id");

            $table->foreign("classe_id")->references('id')->on('classes')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('affc_eleves');
    }
}

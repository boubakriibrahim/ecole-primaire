<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('role');
            $table->string('password');
            //$table->string('role');
            $table->rememberToken();
            $table->date('date_naissance');
            $table->string('adresse');
            $table->unsignedBigInteger('id_enseignant')->nullable();
            $table->unsignedBigInteger('phone');
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

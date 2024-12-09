<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('Appogé')->unique();
            $table->string('Prenom');
            $table->string('Nom');
            $table->string('CIN')->unique();
            $table->string('CNE')->unique();
            $table->string('Niveau');
            $table->string('filiere');
            $table->string('email')->unique();
            $table->string('semestreAct');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('etudiants');
    }
};

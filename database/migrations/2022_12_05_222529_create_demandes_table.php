<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->integer('Appogé');
            $table->string('Prenom');
            $table->string('Nom');
            $table->string('Type');
            $table ->string('Semestre')->nullable();
            $table->string('Email');
            $table->string('CIN')->nullable();
            $table->string('CNE')->nullable();
            //convention:
            $table->string('image')->nullable();
            $table->string('nomEntreprise')->nullable();
            $table->string('representant')->nullable();
            $table->string('adressMail')->nullable();
            $table->string('tele')->nullable();
            $table->string('adresseReel')->nullable();
            $table->string('periode')->nullable();
            $table->string('encadrantEntreprise')->nullable();
            $table->string('encadrantEcole')->nullable();
            $table->string('themeDeStage')->nullable();
            //---------
            $table->string('Etat')->default('n');
            $table->string('Validation')->nullable();
            $table->string('Motif')->nullable();
            $table->string('filename')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('demandes');
    }
};

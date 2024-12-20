<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidenceCertificateRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residence_certificate_requests', function (Blueprint $table) {
            $table->id(); // Colonne ID auto-incrémentée
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('cin', 20)->nullable();
            $table->date('birthdate')->nullable();
            $table->string('birthplace')->nullable();
            $table->string('profession')->nullable();
            $table->string('residence_type')->nullable();
            $table->string('full_address')->nullable();
            $table->string('postal_code', 10)->nullable();
            $table->string('city')->nullable();
            $table->string('proof_doc')->nullable();
            $table->string('proof_doc_path')->nullable();
            $table->string('cin_path')->nullable();
            $table->string('fullname')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_code', 10)->nullable();
            $table->string('phone_number', 20)->nullable();
            $table->string('delivery_place')->nullable();
            $table->string('first_address')->nullable();
            $table->string('second_address')->nullable();
            $table->string('country')->nullable();
            $table->string('statut')->nullable();

            $table->timestamps(); // Colonnes created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('residence_certificate_requests');
    }
}
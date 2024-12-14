<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBirthCertificateRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('birth_certificate_requests', function (Blueprint $table) {
            $table->id(); // Colonne ID auto-incrémentée
            $table->string('region_id')->nullable();
            $table->string('city_id')->nullable();
            $table->string('commune_id')->nullable();
            $table->string('bureau_id')->nullable();
            $table->string('birth_extract_doc_num')->nullable();
            $table->string('birth_complete_doc_num')->nullable();
            $table->string('marriage_interest')->nullable(); 
            $table->string('doc_language', 50)->nullable();
            $table->string('first_name_ar')->nullable();
            $table->string('last_name_ar')->nullable();
            $table->string('first_name_fr')->nullable();
            $table->string('last_name_fr')->nullable();
            $table->string('mother_firstname')->nullable();
            $table->string('mother_lastname')->nullable();
            $table->string('father_firstname')->nullable();
            $table->integer('day_birthdate')->nullable();
            $table->integer('month_birthdate')->nullable();
            $table->integer('year_birthdate')->nullable();
            $table->string('gender', 10)->nullable();
            $table->string('doc_num')->nullable();
            $table->integer('subscription_year')->nullable();
            $table->string('fullname')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_code', 10)->nullable();
            $table->string('phone_number', 20)->nullable();
            $table->string('delivery_place')->nullable();
            $table->string('first_address')->nullable();
            $table->string('second_address')->nullable();
            $table->string('postal_code', 10)->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();

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
        Schema::dropIfExists('birth_certificate_requests');
    }
}
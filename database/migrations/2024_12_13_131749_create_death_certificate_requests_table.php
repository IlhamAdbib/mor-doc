<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeathCertificateRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('death_certificate_requests', function (Blueprint $table) {
            $table->id();

            // Administrative Details
            $table->string('region_id')->nullable();
            $table->string('city_id')->nullable();
            $table->string('commune_id')->nullable();

            // Requester Details
            $table->enum('requester_relationship', [
                'spouse',
                'parent',
                'child',
                'legal_guardian',
                'authorized_proxy'
            ])->nullable();
            $table->string('requester_first_name_ar')->nullable();
            $table->string('requester_last_name_ar')->nullable();
            $table->string('requester_cnie_number')->nullable();
            $table->string('requester_phone_country_code')->nullable();
            $table->string('requester_phone')->nullable();

            // Death Information
            $table->date('death_date')->nullable();
            $table->string('death_place')->nullable();
            $table->string('death_cause')->nullable();
            $table->string('document_number')->nullable();
            $table->year('inscription_year')->nullable();
            $table->string('family_book_number')->nullable();

            // Delivery Details
            $table->string('recipient_full_name')->nullable();
            $table->string('recipient_email')->nullable();
            $table->string('recipient_phone_country_code')->nullable();
            $table->string('recipient_phone')->nullable();
            $table->enum('delivery_location', ['morocco', 'abroad'])->default('morocco')->nullable();
            $table->string('address_line1')->nullable();
            $table->string('address_line2')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('locality')->nullable();
            $table->string('country')->default('MA')->nullable();

            // Document Paths
            $table->string('requester_cnie_document_path')->nullable();
            $table->string('relationship_proof_document_path')->nullable();
            $table->string('medical_death_certificate_path')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('death_certificate_requests');
    }
}

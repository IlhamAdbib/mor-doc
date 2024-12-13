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
            $table->foreignId('region_id')->constrained();
            $table->foreignId('city_id')->constrained();
            $table->foreignId('commune_id')->constrained();
            $table->foreignId('bureau_id')->constrained();

            // Requester Details
            $table->enum('requester_relationship', [
                'spouse',
                'parent',
                'child',
                'legal_guardian',
                'authorized_proxy'
            ]);
            $table->string('requester_first_name_ar');
            $table->string('requester_last_name_ar');
            $table->string('requester_cnie_number');
            $table->string('requester_phone_country_code');
            $table->string('requester_phone');

            // Death Information
            $table->date('death_date');
            $table->string('death_place')->nullable();
            $table->string('death_cause')->nullable();
            $table->string('document_number')->nullable();
            $table->year('inscription_year');
            $table->string('family_book_number')->nullable();

            // Delivery Details
            $table->string('recipient_full_name')->nullable();
            $table->string('recipient_email')->nullable();
            $table->string('recipient_phone_country_code')->nullable();
            $table->string('recipient_phone')->nullable();
            $table->enum('delivery_location', ['morocco', 'abroad'])->default('morocco');
            $table->string('address_line1')->nullable();
            $table->string('address_line2')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('locality')->nullable();
            $table->string('country')->default('MA');

            // Document Paths
            $table->string('requester_cnie_document_path');
            $table->string('relationship_proof_document_path')->nullable();
            $table->string('medical_death_certificate_path');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('death_certificate_requests');
    }
}

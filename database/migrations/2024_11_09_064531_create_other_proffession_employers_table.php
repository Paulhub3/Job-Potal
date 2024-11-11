<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('other_proffession_employers', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('email')->unique();
            $table->string('phone_number');
            $table->string('industry');
            $table->boolean('is_registered_in_europe');
            $table->string('company_type');
            $table->string('company_size');
            $table->text('available_positions');
            $table->integer('number_of_openings');
            $table->string('job_type');
            $table->string('start_availability');
            $table->json('company_country');
            $table->string('address');
            $table->string('zip_code');
            $table->text('required_degrees');
            $table->json('languages');
            $table->json('language_proficiency');
            $table->text('job_description');
            $table->string('contact_method');
            $table->boolean('contact_consent');
            $table->boolean('privacy_consent');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('other_proffession_employers');
    }
};

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
        Schema::create('other_medical_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('primary_specialty');
            $table->string('secondary_specialty')->nullable();
            $table->string('phone_number');
            $table->enum('gender', ['Male', 'Female', 'Non-disclosure']);
            $table->string('eu_license');
            $table->string('cv_path');
            $table->string('country_of_origin');
            $table->string('present_country');
            $table->json('preferred_countries');
            $table->enum('start_availability', ['Immediately', 'Later']);
            $table->text('address');
            $table->string('zip_code');
            $table->json('languages');
            $table->json('language_proficiency');
            $table->enum('job_type', ['Full-time', 'Part-time']);
            $table->enum('contact_method', ['Email Address', 'Whatsapp']);
            $table->text('additional_info')->nullable();
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
        Schema::dropIfExists('other_medical_jobs');
    }
};

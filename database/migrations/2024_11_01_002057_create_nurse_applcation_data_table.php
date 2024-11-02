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
        Schema::create('nurse_applcation_data', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('surname');
            $table->string('email');
            $table->string('phone_number');
            $table->string('gender');
            $table->string('nationality');
            $table->string('country_residence');
            $table->string('work_country');
            $table->string('work_state')->nullable();
            $table->text('work_state_postal_code')->nullable();
            $table->string('future_work');
            $table->string('work_type');
            $table->string('training_type');
            $table->string('additional_qualifications');
            $table->string('language');
            $table->string('language_level');
            $table->string('start_date');
            $table->string('eu_license');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nurse_applcation_data');
    }
};

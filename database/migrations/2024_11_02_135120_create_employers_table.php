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
        Schema::create('employers', function (Blueprint $table) {
            $table->id();
            $table->string('company_location');
            $table->string('company_state');
            $table->text('company_state_postal_code');
            $table->string('profession');
            $table->string('start_date');
            $table->string('salary_range');
            $table->string('currency');
            $table->string('company_name');
            $table->string('company_address');
            $table->string('email');
            $table->string('phone_number');
            $table->text('job_description');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employers');
    }
};

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NurseApplcationData;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;


class NurseApplicationDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        // Pre-defined arrays for specific fields
        $workTypes = ['Hospital', 'Clinic', 'Nursing Home', 'Private Practice', 'Rehabilitation Center'];
        $trainingTypes = ['General Nursing', 'Specialized Care', 'Intensive Care', 'Emergency Care', 'Pediatric Care'];
        $languages = ['English', 'German', 'French', 'Spanish', 'Italian'];
        $languageLevels = ['A1', 'A2', 'B1', 'B2', 'C1', 'C2'];
        $countries = ['Germany', 'France', 'Spain', 'Italy', 'Netherlands', 'Belgium'];
        $availableCountries = ['Germany', 'France', 'Spain', 'Italy', 'United Kingdom', 'Netherlands'];


        for ($i = 0; $i < 4; $i++) {
            $workCountry = $faker->randomElement($countries);

            NurseApplcationData::create([
                'first_name' => $faker->firstName(),
                'middle_name' => $faker->optional(0.7)->firstName(), // 70% chance to have middle name
                'surname' => $faker->lastName(),
                'email' => $faker->unique()->safeEmail(),
                'phone_number' => $faker->phoneNumber(),
                'gender' => $faker->randomElement(['Male', 'Female', 'Other']),
                'nationality' => $faker->country(),
                'country_residence' => $faker->randomElement($availableCountries),
                'work_country' => json_encode([$workCountry]),
                'work_state' => json_encode([$faker->state()]),
                'work_state_postal_code' => json_encode([$faker->postcode()]),
                'future_work' => $faker->dateTimeBetween('now', '+2 years')->format('Y-m-d'),
                'work_type' => $faker->randomElement($workTypes),
                'training_type' => $faker->randomElement($trainingTypes),
                'additional_qualifications' => $faker->text(35),
                'start_date' => $faker->dateTimeBetween('now', '+6 months')->format('Y-m-d'),
                'eu_license' => $faker->boolean(70) ? 'Yes' : 'No', // 70% chance of having EU license
                'language' => $faker->randomElement($languages),
                'language_level' => $faker->randomElement($languageLevels),
                'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
                'updated_at' => now(),
            ]);
        }
    }
}

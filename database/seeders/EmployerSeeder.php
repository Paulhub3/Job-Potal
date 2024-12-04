<?php

namespace Database\Seeders;

use App\Models\Employer;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmployerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        // Pre-defined arrays for specific fields
        $professions = ['Registered Nurse', 'Nurse Practitioner', 'Clinical Nurse', 'ICU Nurse', 'ER Nurse'];
        $locations = ['Germany', 'France', 'Spain', 'Italy', 'Netherlands'];
        $currencies = ['EUR', 'USD', 'GBP'];
        $salaryRanges = [
            '30,000 - 40,000',
            '40,000 - 50,000',
            '50,000 - 60,000',
            '60,000 - 70,000',
            '70,000 - 80,000'
        ];

        for ($i = 0; $i < 200; $i++) {
            $location = $faker->randomElement($locations);

            Employer::create([
                'company_location' => $location,
                'company_state' => $faker->state(),
                'company_state_postal_code' => $faker->postcode(),
                'profession' => $faker->randomElement($professions),
                'start_date' => $faker->dateTimeBetween('now', '+6 months')->format('Y-m-d'),
                'salary_range' => $faker->randomElement($salaryRanges),
                'currency' => $faker->randomElement($currencies),
                'company_name' => $faker->company(),
                'company_address' => $faker->address(),
                'email' => $faker->companyEmail(),
                'phone_number' => $faker->phoneNumber(),
                'job_description' => $faker->paragraphs(3, true),
                'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
                'updated_at' => now(),
            ]);
        }
    }
}

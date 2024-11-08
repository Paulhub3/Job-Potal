<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OtherProffessionEmployee extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'dob',
        'phone_number',
        'gender',
        'profession',
        'degree_level',
        'job_experience',
        'previous_employer',
        'previous_position',
        'cv_path',
        'country_of_origin',
        'present_country',
        'preferred_countries',
        'start_availability',
        'address',
        'zip_code',
        'languages',
        'language_proficiency',
        'job_type',
        'contact_method',
        'additional_info',
        'contact_consent',
        'privacy_consent',
    ];

    protected $casts = [
        'dob' => 'date',
        'preferred_countries' => 'array',
        'languages' => 'array',
        'language_proficiency' => 'array',
        'contact_consent' => 'boolean',
        'privacy_consent' => 'boolean',
    ];


    // Helper method to get language proficiency
    public function getLanguageProficiencyFormatted()
    {
        $proficiency = $this->language_proficiency;
        $formatted = [];

        foreach ($proficiency as $language => $level) {
            $formatted[] = "$language: $level";
        }

        return $formatted;
    }
}

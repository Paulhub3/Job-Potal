<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OtherProffessionEmployer extends Model
{

    protected $fillable = [
        'company_name',
        'email',
        'phone_number',
        'industry',
        'is_registered_in_europe',
        'company_type',
        'company_size',
        'available_positions',
        'number_of_openings',
        'job_type',
        'start_availability',
        'company_country',
        'address',
        'zip_code',
        'required_degrees',
        'languages',
        'language_proficiency',
        'job_description',
        'contact_method',
        'contact_consent',
        'privacy_consent'
    ];


    protected $casts = [
        'company_country' => 'array',
        'languages' => 'array',
        'language_proficiency' => 'array',
        'contact_consent' => 'boolean',
        'privacy_consent' => 'boolean',
        'is_registered_in_europe' => 'boolean',
        'number_of_openings' => 'integer'
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

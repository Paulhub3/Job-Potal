<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherMedicalJob extends Model
{

    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'primary_specialty',
        'secondary_specialty',
        'phone_number',
        'gender',
        'eu_license',
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
        'privacy_consent'
    ];

    protected $casts = [
        'preferred_countries' => 'array',
        'languages' => 'array',
        'language_proficiency' => 'array',
        'contact_consent' => 'boolean',
        'privacy_consent' => 'boolean'
    ];
}

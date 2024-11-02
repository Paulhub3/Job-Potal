<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NurseApplcationData extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'middle_name',
        'surname',
        'email',
        'phone_number',
        'gender',
        'nationality',
        'country_residence',
        'work_country',
        'work_state',
        'work_state_postal_code',
        'future_work',
        'work_type',
        'training_type',
        'additional_qualifications',
        'start_date',
        'eu_license',
        'language',
        'language_level'
    ];
}

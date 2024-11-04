<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{

    protected $fillable = [
        'company_location',
        'company_state',
        'company_state_postal_code',
        'profession',
        'start_date',
        'salary_range',
        'currency',
        'company_name',
        'company_address',
        'email',
        'phone_number',
        'job_description',

    ];
}

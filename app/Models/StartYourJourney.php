<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StartYourJourney extends Model
{
    use HasFactory;
    protected $table = 'request_start_journey';
    protected $fillable = ['name',
                            'email',
                            'phone',
                            'country',
                            'academic_year_plan',
                            'last_education'];

}

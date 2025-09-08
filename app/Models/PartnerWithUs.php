<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerWithUs extends Model
{
    use HasFactory;
    protected $table = 'request_partner_us';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'organization_name',
        'message'
    ];
}

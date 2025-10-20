<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountrySection extends Model
{
    use HasFactory;
    protected $table = 'country_section';
    protected $fillable = ['country_id', 'section_name', 'description'];
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}

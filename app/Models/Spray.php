<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spray extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $fillables = [
        'plant_id',
        'insecticide_id',
        'fungicide_id',
        'fertilizer_id',
        'pgr_id',
        'pump',
        'ltrs',
        'area',
        'date',
    ];
}

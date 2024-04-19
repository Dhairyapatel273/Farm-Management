<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fertigation extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $fillables = [
        'plant_id',
        'fertilizer_id',
        'area',
        'date_of_fertigation',
        'fertilizer_used_in_kgs',
        'total_area',
    ];
}

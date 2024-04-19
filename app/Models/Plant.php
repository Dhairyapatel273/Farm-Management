<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $fillables = [
        'crop_id',
        'company',
        'variety',
        'date_of_plantation',
        'location',
        'area',
        'reviews',
        'days_of_reminder',
    ];
}

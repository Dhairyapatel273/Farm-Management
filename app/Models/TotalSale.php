<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TotalSale extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $fillables = [
        'plant_id',
        'broker_name',
        'kgs',
        'rate',
        'total',
    ];
}

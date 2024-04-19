<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insecticide extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $fillables = [
        'name',
        'technical_name',
    ];
}

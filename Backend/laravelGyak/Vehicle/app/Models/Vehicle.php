<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'name',
        'type',
        'daily_price',
        'deposit',
        'licence_plate',
        'seats',
        'is_available',
        'description',
    ];
}

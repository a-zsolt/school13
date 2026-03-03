<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Games extends Model
{
    protected $fillable = ['title', 'release_year', 'developer', 'platform', 'score', 'price'];
}

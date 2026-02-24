<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Challange extends Model
{
    protected $fillable = [
        'title',
        'max_points'
    ];

    public function submissions(): HasMany
    {
        return $this->hasMany(Submission::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'name',
        'region'
    ];

    /**
     * Get the users associated with the city.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
} 
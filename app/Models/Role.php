<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title'
    ];

    /**
     * Get the users that belong to this role.
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
} 
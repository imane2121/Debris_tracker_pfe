<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollecteSupervisor extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'password',
        'accountStatus',
        'CNI',
        'profilePicture',
        'organisation',
        'region',
    ];

    public function collectes()
    {
        return $this->hasMany(Collecte::class);
    }
}

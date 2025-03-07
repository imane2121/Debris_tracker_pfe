<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollecteSupervisor extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstName', 'lastName', 'email', 'password', 
        'organisation', 'front_organization_card', 'back_organization_card', 
        'accountStatus', 'region', 'CNI', 'profilePicture'
    ];

    protected $hidden = [
        'password',
    ];
}

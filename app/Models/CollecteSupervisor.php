<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollecteSupervisor extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'role', 
        'organization', 'front_organization_card', 'back_organization_card', 'accountStatus'
    ];

    protected $hidden = [
        'password',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollecteSupervisor extends Model
{
    use HasFactory;
    protected $table = 'collecte_supervisors';  // Explicitly define the table name

    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'password',
        'accountStatus',
        'CNI',
        'identityCard',
        'profilePicture',
        'organisation',
        'region',
    ];

    public function collectes()
    {
        return $this->hasMany(Collecte::class);
    }
    protected $casts = [
        'identityCard' => 'array', // Laravel will automatically decode JSON to an array
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'website',
        'contact_email',
        'phone_number',
        'address'
    ];

    /**
     * Get the users associated with the organisation.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}

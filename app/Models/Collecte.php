<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collecte extends Model
{
    use HasFactory;

    protected $fillable = [
        'signal_id',
        'collecte_supervisor_id',
        'admin_id',
        'description',
        'region',
        'image',
        'status',
        'starting_date',
        'end_date',
    ];

    // Cast starting_date and end_date as datetime
    protected $casts = [
        'starting_date' => 'datetime',
        'end_date' => 'datetime',
    ];
}

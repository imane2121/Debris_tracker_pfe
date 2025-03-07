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
        'nbrContributors',
    ];

    // Cast starting_date and end_date as datetime
    protected $casts = [
        'starting_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    // Define the relationship with Signal
    public function signal()
    {
        return $this->belongsTo(Signal::class);
    }

    // Get waste types through the signal relationship
    public function getWasteTypeNames()
    {
        return $this->signal ? $this->signal->getWasteTypeNames() : [];
    }
}

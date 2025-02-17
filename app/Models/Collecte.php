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
        'region',
        'location',
        'status',
        'starting_date',
        'end_date',
    ];

    public function signal()
    {
        return $this->belongsTo(Signal::class);
    }

    public function collecteSupervisor()
    {
        return $this->belongsTo(CollecteSupervisor::class);
    }

    public function admin()
    {
        return $this->belongsTo(Administrator::class);
    }
}

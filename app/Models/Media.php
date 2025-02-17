<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'signal_id',
        'type',
        'url',
    ];

    public function signal()
    {
        return $this->belongsTo(Signal::class);
    }
}

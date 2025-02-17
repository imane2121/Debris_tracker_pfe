<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AiDetection extends Model
{
    use HasFactory;

    protected $fillable = [
        'signal_id',
        'is_debris_detected',
        'detection_type',
        'confidence_level',
    ];

    protected $casts = [
        'detection_type' => 'array',
    ];

    public function signal()
    {
        return $this->belongsTo(Signal::class);
    }
}

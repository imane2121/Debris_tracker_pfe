<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'collecte_id',
        'waste_types',
        'volume',
        'starting_date',
        'end_date',
        'region',
        'location',
        'waste_types_validated',
        'volume_validated',
        'export_format',
    ];

    protected $casts = [
        'waste_types' => 'array',
    ];

    public function collecte()
    {
        return $this->belongsTo(Collecte::class);
    }
}

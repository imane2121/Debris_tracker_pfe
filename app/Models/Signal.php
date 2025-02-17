<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signal extends Model
{
    use HasFactory;

    protected $fillable = [
        'contributorId', 'volume', 'wasteTypes', 'location', 'customType', 'latitude', 'longitude', 'anomalyFlag', 'signalDate', 'status',
    ];

    protected $casts = [
        'wasteTypes' => 'array',  // This will store the waste types as JSON
    ];

    public function contributor()
    {
        return $this->belongsTo(Contributor::class, 'contributorId');
    }

    public function wasteTypes()
    {
        return $this->belongsToMany(WasteType::class, 'signal_waste_type', 'signal_id', 'waste_type_id');
    }
}

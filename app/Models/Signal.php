<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signal extends Model
{
    use HasFactory;

    protected $fillable = [
        'created_by',
        'volume',
        'wasteTypes',
        'location',
        'customType',
        'description',
        'latitude',
        'longitude',
        'anomalyFlag',
        'signalDate',
        'status',
    ];

    // Define a method to get waste types
    public function getWasteTypes()
    {
        $wasteTypeIds = json_decode($this->wasteTypes, true) ?? [];
        return WasteType::whereIn('id', $wasteTypeIds)->get();
    }

    // Define a method to get waste type names
    public function getWasteTypeNames()
    {
        $wasteTypes = $this->getWasteTypes();
        
        // Combine parent and child names
        $result = [];
        foreach ($wasteTypes as $wasteType) {
            if ($wasteType->parent_type_id) {
                // Fetch the parent type name
                $parentType = WasteType::find($wasteType->parent_type_id);
                $result[] = $parentType->name . ' > ' . $wasteType->name;
            } else {
                // If no parent, just use the waste type name
                $result[] = $wasteType->name;
            }
        }

        return $result;
    }

    public function collectes()
    {
        return $this->hasMany(Collecte::class);
    }
}


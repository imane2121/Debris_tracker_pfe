<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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

    // Define a method to get waste type names
    public function getWasteTypeNames()
    {
        // Decode the JSON field
        $wasteTypeIds = json_decode($this->wasteTypes, true);

        // Fetch the waste types with their parent types
        $wasteTypes = WasteType::whereIn('id', $wasteTypeIds)->get();

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

}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WasteType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'parent_type_id',
        'description'
    ];

    // Define the relationship with parent type
    public function parentType()
    {
        return $this->belongsTo(WasteType::class, 'parent_type_id');
    }

    // Define the relationship with child types
    public function childTypes()
    {
        return $this->hasMany(WasteType::class, 'parent_type_id');
    }
}
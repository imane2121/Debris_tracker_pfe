<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WasteType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'parent_type_id'];

    public function parentType()
    {
        return $this->belongsTo(WasteType::class, 'parent_type_id');
    }

    public function childTypes()
    {
        return $this->hasMany(WasteType::class, 'parent_type_id');
    }

    public function signals()
    {
        return $this->belongsToMany(Signal::class, 'signal_waste_type', 'waste_type_id', 'signal_id');
    }
}

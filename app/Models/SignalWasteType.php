<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class SignalWasteType extends Pivot
{
    protected $table = 'signal_waste_type';

    public $timestamps = false;  // Since this is a pivot table, we don't need timestamps here
}

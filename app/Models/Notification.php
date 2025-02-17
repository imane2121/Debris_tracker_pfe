<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'receiver_id',
        'message',
        'type',
        'is_read',
        'read_at',
    ];

    public function receiver()
    {
        return $this->belongsTo(Contributor::class, 'receiver_id');
    }
}

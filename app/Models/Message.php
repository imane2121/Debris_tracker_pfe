<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'collecte_id',
        'sender_id',
        'supervisor_id',
        'sender_type',
        'content',
        'read_status',
    ];

    public function collecte()
    {
        return $this->belongsTo(Collecte::class);
    }

    public function sender()
    {
        return $this->belongsTo(Contributor::class, 'sender_id');
    }

    public function supervisor()
    {
        return $this->belongsTo(CollecteSupervisor::class, 'supervisor_id');
    }
}

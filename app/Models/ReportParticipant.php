<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportParticipant extends Model
{
    use HasFactory;

    protected $fillable = [
        'report_id',
        'contributor_id',
        'present',
    ];

    public function report()
    {
        return $this->belongsTo(Report::class);
    }

    public function contributor()
    {
        return $this->belongsTo(Contributor::class);
    }
}

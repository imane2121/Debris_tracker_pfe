<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    protected $fillable = [
        'scoreCollecte', 'scoreSignal', 'contributorId', 'awardedAt',
    ];

    public function contributor()
    {
        return $this->belongsTo(Contributor::class, 'contributorId');
    }
}

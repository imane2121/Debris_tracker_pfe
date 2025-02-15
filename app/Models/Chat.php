<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class, 'chat_members')
                    ->withPivot('user_type')  // to include the user_type in the pivot table
                    ->withTimestamps(); // automatically manage timestamps
    }
}

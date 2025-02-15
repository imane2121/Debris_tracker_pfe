<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contributor extends Model
{
    protected $fillable = [
        'fullName', 'email', 'phoneNumber', 'password', 'username', 
        'accountStatus', 'profilePicture', 'credibilityScore'
    ];

    // A Contributor can create many Signals
    public function signals()
    {
        return $this->hasMany(Signal::class, 'contributorId');
    }

    // A Contributor can participate in multiple Chats
    public function chatMemberships()
    {
        return $this->hasMany(ChatMembers::class, 'userId')->where('userType', 'Contributor');
    }

    // A Contributor can send multiple Messages
    public function messages()
    {
        return $this->hasMany(Message::class, 'senderId')->where('senderType', 'Contributor');
    }

    // A Contributor has a single Score
    public function score()
    {
        return $this->hasOne(Score::class, 'contributorId');
    }

    // A Contributor can participate in multiple Reports
    public function reports()
    {
        return $this->belongsToMany(Report::class, 'report_participants', 'contributorId', 'reportId');
    }
}


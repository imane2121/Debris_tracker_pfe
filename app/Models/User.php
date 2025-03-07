<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'username',
        'phone_number',
        'role',
        'verified',
        'verification_token',
        'profile_picture',
        'account_status',
        'CNI',
        'organisation_id',
        'city_id',
        'organisation_id_card_recto',
        'organisation_id_card_verso',
        'credibility_score'
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'verification_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'verified' => 'boolean',
        'credibility_score' => 'decimal:2',
    ];

    /**
     * Get the user's full name.
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * Get the roles that belong to the user.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Get the organisation that the user belongs to.
     */
    public function organisation()
    {
        return $this->belongsTo(Organisation::class);
    }

    /**
     * Get the city that the user belongs to.
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Check if the user has a specific role.
     */
    public function hasRole($role)
    {
        return $this->role === $role;
    }

    /**
     * Check if the user is a supervisor.
     */
    public function isSupervisor()
    {
        return $this->role === 'supervisor';
    }

    /**
     * Check if the user is a contributor.
     */
    public function isContributor()
    {
        return $this->role === 'contributor';
    }

    /**
     * Check if the user is an admin.
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function chats()
    {
        return $this->belongsToMany(Chat::class, 'chat_members')
                    ->withPivot('user_type')  // to access the user_type field
                    ->withTimestamps();
    }
}

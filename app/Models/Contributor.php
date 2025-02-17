<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class Contributor extends Model
{
    use HasFactory;

    protected $table = 'contributors';  // Explicitly define the table name


    protected $fillable = [
        'firstName', 'lastName', 'email', 'phoneNumber', 'password', 'username', 'accountStatus', 'profilePicture', 'credibilityScore',
    ];

    // Validation rules
    public static $rules = [
        'phoneNumber' => ['required', 'string', 'min:10', 'max:10'],
        'email' => ['required', 'email'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'username' => ['required', 'string', 'unique:contributors,username'],
    ];

    public function signals()
    {
        return $this->hasMany(Signal::class, 'contributorId');
    }

    public function scores()
    {
        return $this->hasMany(Score::class, 'contributorId');
    }
}

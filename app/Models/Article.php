<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'articles';

    protected $fillable = [
        'title', 
        'content', 
        'author', 
        'category', 
        'image', // Add the image field
        'published_at'
    ];

    // Cast 'published_at' as a date
    protected $casts = [
        'published_at' => 'datetime',
    ];
    }
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magazine extends Model
{
    use HasFactory;

    // Define the fillable fields for the Magazine model
    protected $fillable = [
        'name',
        'description',
        'release_date',
        'cover_image',
    ];

    // Relationships
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
}

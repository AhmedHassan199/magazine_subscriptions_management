<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    // Define the fillable fields for the User model
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    // Relationships
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}

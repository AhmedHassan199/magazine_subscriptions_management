<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    // Define the fillable fields for the Subscription model
    protected $fillable = [
        'user_id', 'magazine_id', 'start_date', 'end_date', 'status', 'plan_type', 'renewed'
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function magazine()
    {
        return $this->belongsTo(Magazine::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}

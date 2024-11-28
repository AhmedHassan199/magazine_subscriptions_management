<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    // Define the fillable fields for the Article model
    protected $fillable = [
        'magazine_id',
        'title',
        'content',
        'publication_date',
        'author_name',
    ];

    // Relationships
    public function magazine()
    {
        return $this->belongsTo(Magazine::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}

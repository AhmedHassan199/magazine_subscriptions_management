<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // Define the fillable fields for the Comment model
    protected $fillable = [
        'article_id',
        'user_id',
        'content',
        'is_approved',
        'comment_date',
    ];
    protected function getLogName(): string
    {
        return 'comment'; // Custom log name for Article
    }

    protected function getLogAttributes(): array
    {
        return  [
            'article_id',
            'user_id',
            'content',
            'is_approved',
            'comment_date',
        ];
    }
    // Relationships
    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

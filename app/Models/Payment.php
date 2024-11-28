<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    // Define the fillable fields for the Payment model
    protected $fillable = [
        'subscription_id',
        'user_id',
        'amount',
        'payment_method',
        'payment_date',
        'transaction_id',
    ];
    protected function getLogName(): string
    {
        return 'payment'; // Custom log name for Magazine
    }

    protected function getLogAttributes(): array
    {
        return [
            'subscription_id',
            'user_id',
            'amount',
            'payment_method',
            'payment_date',
            'transaction_id',
        ];
    }
    // Relationships
    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
}

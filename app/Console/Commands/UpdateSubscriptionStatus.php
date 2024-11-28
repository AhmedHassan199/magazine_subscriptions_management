<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Subscription;
use Carbon\Carbon;

class UpdateSubscriptionStatus extends Command
{
    protected $signature = 'subscriptions:update-status';
    protected $description = 'Update subscription statuses based on their end date';

    public function handle()
    {
        $subscriptions = Subscription::all();

        foreach ($subscriptions as $subscription) {
            if (Carbon::now()->gt($subscription->end_date)) {
                $subscription->update(['status' => 'expired']);
            } elseif (Carbon::now()->diffInDays($subscription->end_date) <= 7 && $subscription->status == 'active') {
                // Send email notification for near expiry
                \Mail::to($subscription->user->email)->send(new SubscriptionExpiryNotification($subscription));
            }
        }

        $this->info('Subscription statuses updated successfully.');
    }
}

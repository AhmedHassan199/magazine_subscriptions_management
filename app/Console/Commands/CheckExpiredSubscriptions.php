<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Subscription;
use Illuminate\Support\Facades\Mail;

class CheckExpiredSubscriptions extends Command
{
    // Command signature
    protected $signature = 'subscriptions:check-expired';
    protected $description = 'Check and update expired subscriptions, and send periodic reports';

    public function handle()
    {
        // Fetch subscriptions that have expired
        $expiredSubscriptions = Subscription::where('end_date', '<', now())
            ->where('status', '!=', 'expired')
            ->get();

        // Mark them as expired
        foreach ($expiredSubscriptions as $subscription) {
            $subscription->update(['status' => 'expired']);
        }

        // Optional: Fetch active subscriptions for the report
        $activeSubscriptions = Subscription::where('status', 'active')->get();

        // Prepare a report for the manager
        $reportData = [
            'activeCount' => $activeSubscriptions->count(),
            'expiredCount' => $expiredSubscriptions->count(),
        ];

        // Send email (create a Mailable for better structuring)
        Mail::raw("Subscription Report:\n\nActive: {$reportData['activeCount']}\nExpired: {$reportData['expiredCount']}", function ($message) {
            $message->to('manager@example.com')->subject('Subscription Report');
        });

        // Log the output to the console
        $this->info('Expired subscriptions updated and report sent.');
    }
}

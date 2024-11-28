<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class SubscriptionExpiryNotification extends Notification
{
    protected $subscription;

    public function __construct($subscription)
    {
        $this->subscription = $subscription;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('اشعار بقرب انتهاء اشتراكك')
            ->line('اشتراكك في خطة ' . $this->subscription->plan_name . ' سينتهي قريباً.')
            ->line('تاريخ انتهاء الاشتراك: ' . $this->subscription->end_date->format('Y-m-d'))
            ->action('تجديد الاشتراك', url('/subscriptions/renew'))
            ->line('شكراً لاستخدامك خدمتنا!');
    }
}

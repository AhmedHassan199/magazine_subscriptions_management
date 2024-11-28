<?php

namespace App\Policies;

use App\Models\Subscription;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SubscriptionPolicy
{
    public function viewAny(User $user)
    {
        return in_array($user->role, ['admin', 'subscriber']);
    }

    public function create(User $user)
    {
        return $user->role === 'subscriber';
    }

    public function update(User $user, Subscription $subscription)
    {
        return $user->role === 'admin';
    }

    public function delete(User $user, Subscription $subscription)
    {
        return $user->role === 'admin';
    }
}

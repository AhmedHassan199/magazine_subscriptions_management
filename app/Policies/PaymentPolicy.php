<?php

namespace App\Policies;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PaymentPolicy
{
    public function viewAny(User $user)
{
    return $user->role === 'admin';
}

public function create(User $user)
{
    return $user->role === 'admin';
}

public function update(User $user, Payment $payment)
{
    return $user->role === 'admin';
}

public function delete(User $user, Payment $payment)
{
    return $user->role === 'admin';
}
}

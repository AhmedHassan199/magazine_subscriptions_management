<?php

namespace App\Policies;

use App\Models\Magazine;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class MagazinePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        return in_array($user->role, ['admin', 'publisher', 'subscriber']);
    }

    public function create(User $user)
    {
        return $user->role === 'publisher';
    }

    public function update(User $user, Magazine $magazine)
    {
        return $user->role === 'publisher';
    }

    public function delete(User $user, Magazine $magazine)
    {
        return $user->role === 'admin';
    }

}

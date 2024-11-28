<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CommentPolicy
{
    public function viewAny(User $user)
    {
        return in_array($user->role, ['admin', 'subscriber']);
    }

    public function create(User $user)
    {
        return $user->role === 'subscriber';
    }

    public function approve(User $user)
    {
        return $user->role === 'admin';
    }

    public function delete(User $user, Comment $comment)
    {
        return $user->role === 'admin';
    }

}

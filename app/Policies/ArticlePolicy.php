<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ArticlePolicy
{
    public function viewAny(User $user)
{
    return in_array($user->role, ['admin', 'publisher', 'subscriber']);
}

public function create(User $user)
{
    return $user->role === 'publisher';
}

public function update(User $user, Article $article)
{
    return $user->role === 'publisher';
}

public function delete(User $user, Article $article)
{
    return $user->role === 'admin';
}

}

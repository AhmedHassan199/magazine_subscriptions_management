<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Magazine;
use App\Models\Payment;
use App\Models\Subscription;
use App\Models\User;
use App\Policies\ArticlePolicy;
use App\Policies\CommentPolicy;
use App\Policies\MagazinePolicy;
use App\Policies\PaymentPolicy;
use App\Policies\SubscriptionPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        User::class => UserPolicy::class,
        Magazine::class => MagazinePolicy::class,
        Subscription::class => SubscriptionPolicy::class,
        Payment::class => PaymentPolicy::class,
        Article::class => ArticlePolicy::class,
        Comment::class => CommentPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        //
    }
}

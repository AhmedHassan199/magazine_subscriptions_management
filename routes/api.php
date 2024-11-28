<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MagazineController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;

Route::middleware('auth:sanctum')->group(function () {

    // **Subscriber Routes**
    Route::middleware('role:subscriber')->group(function () {
        // View Magazines and Articles
        Route::get('/magazines', [MagazineController::class, 'index']);
        Route::get('/articles', [ArticleController::class, 'index']);

        // Subscriptions
        Route::post('/subscriptions', [SubscriptionController::class, 'store']);
        Route::get('/subscriptions', [SubscriptionController::class, 'index']);

        // Comments
        Route::post('/comments', [CommentController::class, 'store']);
        Route::get('/comments', [CommentController::class, 'index']);
    });

    // **Publisher Routes**
    Route::middleware('role:publisher')->group(function () {
        // Manage Magazines
        Route::resource('magazines', MagazineController::class)->except(['index', 'show']);

        // Manage Articles
        Route::resource('articles', ArticleController::class)->except(['index', 'show']);
    });

    // **Admin Routes**
    Route::middleware('role:admin')->group(function () {
        // Manage Users
        Route::resource('users', UserController::class);

        // Approve Comments
        Route::post('/comments/{id}/approve', [CommentController::class, 'approve']);

        // Manage Payments
        Route::resource('payments', PaymentController::class);

        // View Subscriptions (Admin Overview)
        Route::get('/subscriptions/admin', [SubscriptionController::class, 'adminIndex']);
        Route::post('/comments/{id}/approve', [CommentController::class, 'approveComment']);
        Route::post('/comments/{id}/reject', [CommentController::class, 'rejectComment']);
    });
});

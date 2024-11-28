<?php

namespace App\Http\Controllers;

use App\Services\SubscriptionService;
use App\Http\Requests\StoreSubscriptionRequest;
use App\Helpers\ApiResponseHelper;
use App\Models\Subscription; // Import the Subscription model
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    protected $subscriptionService;

    public function __construct(SubscriptionService $subscriptionService)
    {
        $this->subscriptionService = $subscriptionService;
    }

    public function store(StoreSubscriptionRequest $request)
    {
        $this->authorize('create', Subscription::class); // Authorization check

        try {
            $subscription = $this->subscriptionService->create($request->validated());
            return ApiResponseHelper::success('Subscription created successfully', $subscription);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Error creating subscription', $e->getMessage());
        }
    }

    public function update($id, StoreSubscriptionRequest $request)
    {
        $subscription = $this->subscriptionService->getById($id);
        $this->authorize('update', $subscription); // Authorization check

        try {
            $updatedSubscription = $this->subscriptionService->update($id, $request->validated());
            return ApiResponseHelper::success('Subscription updated successfully', $updatedSubscription);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Error updating subscription', $e->getMessage());
        }
    }

    public function delete($id)
    {
        $subscription = $this->subscriptionService->getById($id);
        $this->authorize('delete', $subscription); // Authorization check

        try {
            $this->subscriptionService->delete($id);
            return ApiResponseHelper::success('Subscription deleted successfully');
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Error deleting subscription', $e->getMessage());
        }
    }

    public function index()
    {
        $this->authorize('viewAny', Subscription::class); // Authorization check

        try {
            $subscriptions = $this->subscriptionService->getAll();
            return ApiResponseHelper::success('Subscriptions retrieved successfully', $subscriptions);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Error fetching subscriptions', $e->getMessage());
        }
    }

    public function show($id)
    {
        $subscription = $this->subscriptionService->getById($id);
        $this->authorize('view', $subscription); // Authorization check

        try {
            return ApiResponseHelper::success('Subscription retrieved successfully', $subscription);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Subscription not found', $e->getMessage());
        }
    }
}

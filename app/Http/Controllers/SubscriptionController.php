<?php

namespace App\Http\Controllers;

use App\Services\SubscriptionService;
use App\Http\Requests\StoreSubscriptionRequest;
use App\Helpers\ApiResponseHelper;
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
        try {
            $subscription = $this->subscriptionService->create($request->validated());
            return ApiResponseHelper::success('Subscription created successfully', $subscription);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Error creating subscription', $e->getMessage());
        }
    }

    public function update($id, StoreSubscriptionRequest $request)
    {
        try {
            $subscription = $this->subscriptionService->update($id, $request->validated());
            return ApiResponseHelper::success('Subscription updated successfully', $subscription);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Error updating subscription', $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $this->subscriptionService->delete($id);
            return ApiResponseHelper::success('Subscription deleted successfully');
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Error deleting subscription', $e->getMessage());
        }
    }

    public function index()
    {
        try {
            $subscriptions = $this->subscriptionService->getAll();
            return ApiResponseHelper::success('Subscriptions retrieved successfully', $subscriptions);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Error fetching subscriptions', $e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $subscription = $this->subscriptionService->getById($id);
            return ApiResponseHelper::success('Subscription retrieved successfully', $subscription);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Subscription not found', $e->getMessage());
        }
    }
}

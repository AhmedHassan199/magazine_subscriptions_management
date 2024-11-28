<?php

namespace App\Http\Controllers;

use App\Services\PaymentService;
use App\Http\Requests\StorePaymentRequest;
use App\Helpers\ApiResponseHelper;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function store(StorePaymentRequest $request)
    {
        try {
            $payment = $this->paymentService->create($request->validated());
            return ApiResponseHelper::success('Payment created successfully', $payment);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Error creating payment', $e->getMessage());
        }
    }

    public function update($id, StorePaymentRequest $request)
    {
        try {
            $payment = $this->paymentService->update($id, $request->validated());
            return ApiResponseHelper::success('Payment updated successfully', $payment);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Error updating payment', $e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $this->paymentService->delete($id);
            return ApiResponseHelper::success('Payment deleted successfully');
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Error deleting payment', $e->getMessage());
        }
    }

    public function index()
    {
        try {
            $payments = $this->paymentService->getAll();
            return ApiResponseHelper::success('Payments retrieved successfully', $payments);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Error fetching payments', $e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $payment = $this->paymentService->getById($id);
            return ApiResponseHelper::success('Payment retrieved successfully', $payment);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Payment not found', $e->getMessage());
        }
    }
}

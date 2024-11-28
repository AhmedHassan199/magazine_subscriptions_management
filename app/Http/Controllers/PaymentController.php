<?php

namespace App\Http\Controllers;

use App\Services\PaymentService;
use App\Http\Requests\StorePaymentRequest;
use App\Helpers\ApiResponseHelper;
use App\Models\Payment; // Import the Payment model
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
        $this->authorize('create', Payment::class); // Authorization check

        try {
            $payment = $this->paymentService->create($request->validated());
            return ApiResponseHelper::success('Payment created successfully', $payment);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Error creating payment', $e->getMessage());
        }
    }

    public function update($id, StorePaymentRequest $request)
    {
        $payment = $this->paymentService->getById($id);
        $this->authorize('update', $payment); // Authorization check

        try {
            $updatedPayment = $this->paymentService->update($id, $request->validated());
            return ApiResponseHelper::success('Payment updated successfully', $updatedPayment);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Error updating payment', $e->getMessage());
        }
    }

    public function delete($id)
    {
        $payment = $this->paymentService->getById($id);
        $this->authorize('delete', $payment); // Authorization check

        try {
            $this->paymentService->delete($id);
            return ApiResponseHelper::success('Payment deleted successfully');
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Error deleting payment', $e->getMessage());
        }
    }

    public function index()
    {
        $this->authorize('viewAny', Payment::class); // Authorization check

        try {
            $payments = $this->paymentService->getAll();
            return ApiResponseHelper::success('Payments retrieved successfully', $payments);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Error fetching payments', $e->getMessage());
        }
    }

    public function show($id)
    {
        $payment = $this->paymentService->getById($id);
        $this->authorize('view', $payment); // Authorization check

        try {
            return ApiResponseHelper::success('Payment retrieved successfully', $payment);
        } catch (\Exception $e) {
            return ApiResponseHelper::error('Payment not found', $e->getMessage());
        }
    }
}

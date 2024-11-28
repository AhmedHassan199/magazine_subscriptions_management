<?php

namespace App\Services;

use App\Repositories\PaymentRepository;

class PaymentService
{
    protected $paymentRepository;

    public function __construct(PaymentRepository $paymentRepository)
    {
        $this->paymentRepository = $paymentRepository;
    }

    public function create(array $data)
    {
        return $this->paymentRepository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->paymentRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->paymentRepository->delete($id);
    }

    public function getAll()
    {
        return $this->paymentRepository->all();
    }

    public function getById($id)
    {
        return $this->paymentRepository->find($id);
    }
}

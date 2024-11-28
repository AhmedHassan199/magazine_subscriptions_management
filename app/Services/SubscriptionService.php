<?php

namespace App\Services;

use App\Repositories\SubscriptionRepository;

class SubscriptionService
{
    protected $subscriptionRepo;

    public function __construct(SubscriptionRepository $subscriptionRepo)
    {
        $this->subscriptionRepo = $subscriptionRepo;
    }

    public function create(array $data)
    {
        return $this->subscriptionRepo->create($data);
    }

    public function update($id, array $data)
    {
        return $this->subscriptionRepo->update($id, $data);
    }

    public function delete($id)
    {
        return $this->subscriptionRepo->delete($id);
    }

    public function getAll()
    {
        return $this->subscriptionRepo->all();
    }

    public function getById($id)
    {
        return $this->subscriptionRepo->find($id);
    }
}

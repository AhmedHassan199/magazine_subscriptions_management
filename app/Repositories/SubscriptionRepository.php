<?php

namespace App\Repositories;

use App\Models\Subscription;

class SubscriptionRepository
{
    public function create(array $data)
    {
        return Subscription::create($data);
    }

    public function find($id)
    {
        return Subscription::findOrFail($id);
    }

    public function update($id, array $data)
    {
        $subscription = $this->find($id);
        $subscription->update($data);
        return $subscription;
    }

    public function delete($id)
    {
        $subscription = $this->find($id);
        return $subscription->delete();
    }

    public function all()
    {
        return Subscription::all();
    }
}

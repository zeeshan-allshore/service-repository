<?php

namespace App\Repositories;

use App\Models\Customer;

class CustomerRepository
{
    public function allActiveCustomers()
    {
        return Customer::with('user')
            ->where('is_active', '1')
            ->orderBy('name')
            ->get()
            ->map->format();
    }

    public function update($customerId, $data)
    {
        return $this->findById($customerId);
    }
    public function findById($customerId)
    {
        return Customer::with('user')
            ->where('is_active', '1')
            ->where('id', $customerId)
            ->firstOrFail()->format();
    }
}

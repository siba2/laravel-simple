<?php

declare(strict_types=1);


namespace App\Infrastructure\Persistence\Eloquent\Customer;

use App\Domain\Customer\Entity\Customer;
use App\Domain\Customer\Repository\CustomerRepositoryInterface;
use App\Domain\Customer\ValueObject\CustomerId;

final class CustomerRepository implements CustomerRepositoryInterface
{
    public function save(Customer $customer): void
    {
        $model = CustomerModel::create([
            'id' => $customer->id()->value(),
            'name' => $customer->name(),
            'email' => $customer->email()->value(),
            'active' => true,
        ]);

        $model->save();
    }

    public function find(CustomerId $id): ?Customer
    {
        return null;
    }

    public function delete(Customer $customer): void
    {
        // TODO: Implement delete() method.
    }
}

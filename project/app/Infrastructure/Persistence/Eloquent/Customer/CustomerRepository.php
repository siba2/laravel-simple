<?php

declare(strict_types=1);


namespace App\Infrastructure\Persistence\Eloquent\Customer;

use App\Domain\Customer\Entity\Customer;
use App\Domain\Customer\Repository\CustomerRepositoryInterface;
use App\Domain\Customer\ValueObject\CustomerId;
use App\Domain\Shared\ValueObject\Email;

final class CustomerRepository implements CustomerRepositoryInterface
{
    public function save(Customer $customer): void
    {
        $model = CustomerModel::updateOrCreate(
            ['id' => $customer->id()->value()],
            [
                'name' => $customer->name(),
                'email' => $customer->email()->value(),
                'active' => true,
            ]
        );

        $model->save();
    }

    public function find(CustomerId $id): ?Customer
    {
        $model = CustomerModel::find($id->value());

        if (!$model) {
            return null;
        }

        return CustomerModel::mapToEntity($model);
    }

    public function delete(Customer $customer): void
    {
        // TODO: Implement delete() method.
    }

    public function remove(Customer $customer): void
    {
        $model = CustomerModel::updateOrCreate(
            ['id' => $customer->id()->value()],
            [
                'deleted' => $customer->getDeleted()
            ]
        );
    }
}

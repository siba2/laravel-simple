<?php

declare(strict_types=1);


namespace App\Infrastructure\Persistence\Eloquent\Customer;

use App\Application\Customer\DTO\CustomerFilter;
use App\Domain\Customer\Reader\CustomerReaderInterface;
use App\Domain\Customer\ValueObject\CustomerId;

final class CustomerReader implements CustomerReaderInterface
{

    public function find(CustomerId $id): ?array
    {
        $model = CustomerModel::find($id);

        if ($model === null) {
            return null;
        }

        return $model->toArray();
    }

    public function getAll(CustomerFilter $filter): array
    {
        return CustomerModel::query()
        ->filter($filter)
        ->get()
        ->toArray();
    }
}

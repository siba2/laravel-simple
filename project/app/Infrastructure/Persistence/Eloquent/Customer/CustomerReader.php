<?php

declare(strict_types=1);


namespace App\Infrastructure\Persistence\Eloquent\Customer;

use App\Domain\Customer\Entity\Customer;
use App\Domain\Customer\Reader\ProductReaderInterface;
use App\Domain\Customer\ValueObject\CustomerId;

final class CustomerReader implements ProductReaderInterface
{

    public function find(CustomerId $id): ?Customer
    {
        return CustomerModel::find($id);
    }

    public function getAll(): array
    {
        return CustomerModel::filter()->get();
    }
}

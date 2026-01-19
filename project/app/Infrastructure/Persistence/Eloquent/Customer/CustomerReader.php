<?php

declare(strict_types=1);


namespace App\Infrastructure\Persistence\Eloquent\Customer;

use App\Application\Customer\DTO\CustomerFilter;
use App\Domain\Customer\Entity\Customer;
use App\Domain\Customer\Reader\CustomerReaderInterface;
use App\Domain\Customer\ValueObject\CustomerId;

final class CustomerReader implements CustomerReaderInterface
{

    public function find(CustomerId $id): ?Customer
    {
        return CustomerModel::find($id);
    }

    public function getAll(CustomerFilter $filter): array
    {
        return CustomerModel::filter($filter);
    }
}

<?php

namespace App\Domain\Customer\Reader;

use App\Application\Customer\DTO\CustomerFilter;
use App\Domain\Customer\Entity\Customer;
use App\Domain\Customer\ValueObject\CustomerId;

interface CustomerReaderInterface
{
    public function find(CustomerId $id): ?array;
    public function getAll(CustomerFilter $filter): array;

}

<?php

namespace App\API\Command;

use App\Application\Customer\DTO\CreateCustomerDTO;
use App\Domain\Customer\ValueObject\CustomerId;

interface CreateCustomerInterface
{
    public function __invoke(CreateCustomerDTO $dto): CustomerId;
}

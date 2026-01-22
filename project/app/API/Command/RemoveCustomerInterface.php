<?php

namespace App\API\Command;

use App\Application\Customer\DTO\RemoveCustomerDTO;
use App\Application\Exceptions\CustomerNotFoundException;

interface RemoveCustomerInterface
{
    /**
     * @throws CustomerNotFoundException
     */
    public function __invoke(RemoveCustomerDTO $dto): void;
}

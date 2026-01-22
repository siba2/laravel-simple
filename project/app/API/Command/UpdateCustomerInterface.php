<?php

namespace App\API\Command;

use App\Application\Customer\DTO\UpdateCustomerDTO;
use App\Application\Customer\Exceptions\CustomerNotFoundException;

interface UpdateCustomerInterface
{
    /**
     * @throws CustomerNotFoundException
     */
    public function __invoke(UpdateCustomerDTO $dto): void;
}

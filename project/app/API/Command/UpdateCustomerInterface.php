<?php

namespace App\API\Command;

use App\Application\Customer\DTO\UpdateCustomerDTO;
use App\Application\Exceptions\CustomerNotFoundException;

interface UpdateCustomerInterface
{
    /**
     * @throws CustomerNotFoundException
     */
    public function __invoke(UpdateCustomerDTO $dto): void;
}

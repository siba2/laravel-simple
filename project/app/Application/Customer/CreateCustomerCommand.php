<?php

declare(strict_types=1);

namespace App\Application\Customer;

use App\Application\Product\DTO\CreateCustomerDTO;

final readonly class CreateCustomerCommand
{
    public function __construct(
        public readonly CreateCustomerDTO $dto
    ) {}
}

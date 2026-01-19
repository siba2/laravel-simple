<?php

declare(strict_types=1);

namespace App\Application\Customer\Command;

use App\Application\Customer\DTO\CreateCustomerDTO;

final readonly class CreateCustomerCommand
{
    public function __construct(
        public CreateCustomerDTO $dto
    ) {}
}

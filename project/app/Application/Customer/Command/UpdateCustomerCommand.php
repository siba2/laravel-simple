<?php

declare(strict_types=1);

namespace App\Application\Customer\Command;

use App\Application\Customer\DTO\UpdateCustomerDTO;

final readonly class UpdateCustomerCommand
{
    public function __construct(
        public UpdateCustomerDTO $dto
    ) {}
}

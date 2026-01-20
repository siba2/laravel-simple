<?php

declare(strict_types=1);

namespace App\Application\Customer\Command;

use App\Application\Customer\DTO\RemoveCustomerDTO;

final readonly class RemoveCustomerCommand
{
    public function __construct(
        public RemoveCustomerDTO $dto
    ) {}
}

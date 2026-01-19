<?php

declare(strict_types=1);

namespace App\Application\Order\Command;

use App\Application\Order\DTO\CreateOrderDTO;

final readonly class CreateOrderCommand
{
    public function __construct(
        public CreateOrderDTO $dto
    ) {}
}

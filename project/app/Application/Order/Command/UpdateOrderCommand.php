<?php

declare(strict_types=1);

namespace App\Application\Order\Command;

use App\Application\Order\DTO\UpdateOrderDTO;

final readonly class UpdateOrderCommand
{
    public function __construct(
        public UpdateOrderDTO $dto
    ) {}
}

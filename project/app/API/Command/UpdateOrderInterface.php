<?php

namespace App\API\Command;

use App\Application\Order\DTO\UpdateOrderDTO;

interface UpdateOrderInterface
{
    public function __invoke(UpdateOrderDTO $dto): void;
}

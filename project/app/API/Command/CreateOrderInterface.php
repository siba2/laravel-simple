<?php

namespace App\API\Command;

use App\Application\Exceptions\CustomerNotFoundException;
use App\Application\Exceptions\ProductNotFoundException;
use App\Application\Order\DTO\CreateOrderDTO;
use App\Domain\Order\ValueObject\OrderId;

interface CreateOrderInterface
{
    /**
     * @throws CustomerNotFoundException
     * @throws ProductNotFoundException
     */
    public function __invoke(CreateOrderDTO $dto): OrderId;
}

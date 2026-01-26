<?php

namespace App\API\Command;

use App\Application\Exceptions\CustomerNotFoundException;
use App\Application\Exceptions\ProductNotFoundException;
use App\Application\Order\DTO\CreateOrderDTO;
use App\Domain\Order\ValueObject\OrderId;
use App\Domain\Shared\Exceptions\DomainException;

interface CreateOrderInterface
{
    /**
     * @throws CustomerNotFoundException
     * @throws ProductNotFoundException
     * @throws DomainException
     */
    public function __invoke(CreateOrderDTO $dto): OrderId;
}

<?php

namespace App\Domain\Order\Reader;

use App\Application\Order\DTO\OrderFilter;
use App\Domain\Order\Entity\Order;
use App\Domain\Order\ValueObject\OrderId;

interface OrderReaderInterface
{
    public function find(OrderId $id): ?array;
    public function getAll(OrderFilter $filter): array;

}

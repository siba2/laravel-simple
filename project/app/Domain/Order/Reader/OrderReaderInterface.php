<?php

namespace App\Domain\Order\Reader;

use App\Domain\Order\Entity\Order;
use App\Domain\Order\ValueObject\OrderId;

interface OrderReaderInterface
{
    public function find(OrderId $id): ?Order;
    public function getAll(): array;

}

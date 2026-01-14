<?php

namespace App\Domain\Order\Repositories;

use App\Domain\Order\Entity\Order;

interface OrderRepositoryInterface
{
    public function save(Order $name): void;
    public function update(int $id, string $name): void; //todo OrderId
}

<?php

namespace App\Domain\Order\Repositories;

use App\Domain\Order\Entity\Order;

interface OrderRepositoryInterface
{
    public function save(Order $order): void;
}

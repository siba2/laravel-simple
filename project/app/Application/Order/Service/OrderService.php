<?php

declare(strict_types=1);

namespace App\Application\Order\Service;



use App\Domain\Order\Entity\Order;
use App\Domain\Order\Repositories\OrderRepositoryInterface;

final readonly class OrderService
{
    public function __construct(private OrderRepositoryInterface $repository)
    {
    }

    public function create(Order $order): void
    {
        $this->repository->save($order);
    }
}

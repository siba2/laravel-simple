<?php

declare(strict_types=1);


namespace App\Domain\Order\Services;

use App\Domain\Order\Entity\Order;
use App\Domain\Order\Repositories\OrderRepositoryInterface;

readonly class OrderService
{
    public function __construct(private OrderRepositoryInterface $repository) {

    }

    public function create(string $name): void
    {
        $test = Order::create($name);

        $this->repository->save($test);
    }

    public function update(string $name): void
    {
        $this->repository->save($name);
    }
}

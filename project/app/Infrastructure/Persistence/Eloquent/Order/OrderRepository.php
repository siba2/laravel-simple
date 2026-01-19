<?php

declare(strict_types=1);


namespace App\Infrastructure\Persistence\Eloquent\Order;

use App\Domain\Order\Entity\Order;
use App\Domain\Order\Repositories\OrderRepositoryInterface;

final class OrderRepository implements OrderRepositoryInterface
{
    public function save(Order $order): void
    {
        $model = OrderModel::create([
            'id' => $order->id()->value(),
            'customer_id' => $order->getCustomer(),
            'total_price' => $order->totalPrice()->amount(),
            'currency' => $order->totalPrice()->currency(),
            'status' => '', //todo enum
        ]);

        $model->save();
    }
}

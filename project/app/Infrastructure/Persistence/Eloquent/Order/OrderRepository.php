<?php

declare(strict_types=1);


namespace App\Infrastructure\Persistence\Eloquent\Order;

use App\Domain\Order\Entity\Order;
use App\Domain\Order\Repositories\OrderRepositoryInterface;
use App\Infrastructure\Persistence\Eloquent\Product\ProductModel;

final class OrderRepository implements OrderRepositoryInterface
{
    public function save(Order $order): void
    {
        $model = OrderModel::updateOrCreate(
            ['id' => $order->id()->value()],
            [
                'customer_id' => $order->getCustomer()->id()->value(),
                'total_price' => $order->totalPrice()->amount(),
                'currency' => $order->totalPrice()->currency(),
                'status' => $order->getStatus()->value
            ]
        );

        foreach ($order->products() as $product) {
            OrderItemModel::updateOrCreate(
                ['id' => $product->getId()->value()],
                [
                    'order_id' => $model->id,
                    'product_id' => $product->product()->id()->value(),
                    'quantity' => $product->quantity(),
                    'unit_price' => $product->product()->price()->amount(),
                    'currency' => $product->product()->price()->currency(),
                ]
            );
        }

        $model->save();
    }
}

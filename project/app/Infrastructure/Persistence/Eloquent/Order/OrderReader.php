<?php

declare(strict_types=1);


namespace App\Infrastructure\Persistence\Eloquent\Order;

use App\Application\Order\DTO\OrderFilter;
use App\Domain\Order\Reader\OrderReaderInterface;
use App\Domain\Order\ValueObject\OrderId;

final class OrderReader implements OrderReaderInterface
{

    public function find(OrderId $id): ?array
    {
        $model = OrderModel::find($id);

        if ($model === null) {
            return null;
        }

        return $model->toArray();
    }

    public function getAll(OrderFilter $filter): array
    {
        return OrderModel::query()
            ->filter($filter)
            ->get()
            ->toArray();
    }
}

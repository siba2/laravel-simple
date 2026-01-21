<?php

declare(strict_types=1);


namespace App\Application\Order\Handler;

use App\Application\Order\Query\GetAllOrderQuery;
use App\Domain\Order\Reader\OrderReaderInterface;

final readonly class GetAllOrderHandler
{
    public function __construct(private OrderReaderInterface $reader)
    {
    }

    public function handle(GetAllOrderQuery $query): array
    {
        return $this->reader->getAll($query->filter);
    }
}

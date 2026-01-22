<?php

declare(strict_types=1);

namespace App\Application\Order\Query;

use App\API\Query\GetAllOrdersInterface;
use App\Application\Order\DTO\OrderFilter;
use App\Domain\Order\Reader\OrderReaderInterface;

final readonly class GetAllOrderQuery implements GetAllOrdersInterface
{
    public function __construct(private OrderReaderInterface $reader)
    {
    }

    public function __invoke(OrderFilter $filter): array
    {
        return $this->reader->getAll($filter);
    }
}

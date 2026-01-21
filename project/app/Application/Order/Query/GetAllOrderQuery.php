<?php

declare(strict_types=1);

namespace App\Application\Order\Query;

use App\Application\Order\DTO\OrderFilter;

final readonly class GetAllOrderQuery
{
    public function __construct(
        public OrderFilter $filter
    ) {}
}

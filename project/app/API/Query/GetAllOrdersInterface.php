<?php

namespace App\API\Query;

use App\Application\Order\DTO\OrderFilter;

interface GetAllOrdersInterface
{
    public function __invoke(OrderFilter $filter): array;
}

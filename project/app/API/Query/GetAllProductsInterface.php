<?php

namespace App\API\Query;

use App\Application\Product\DTO\ProductFilter;

interface GetAllProductsInterface
{
    public function __invoke(ProductFilter $filter): array;
}

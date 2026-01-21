<?php

declare(strict_types=1);

namespace App\Application\Product\Query;

use App\Application\Product\DTO\ProductFilter;

final readonly class GetAllProductQuery
{
    public function __construct(
        public ProductFilter $filter
    ) {}
}

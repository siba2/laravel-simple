<?php

declare(strict_types=1);

namespace App\Application\Product\Query;

use App\API\Query\GetAllProductsInterface;
use App\Application\Product\DTO\ProductFilter;
use App\Domain\Product\Reader\ProductReaderInterface;

final readonly class GetAllProductQuery implements GetAllProductsInterface
{
    public function __construct(private ProductReaderInterface $reader)
    {
    }

    public function __invoke(ProductFilter $filter): array
    {
        return $this->reader->getAll($filter);
    }
}

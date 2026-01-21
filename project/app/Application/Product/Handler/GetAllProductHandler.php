<?php

declare(strict_types=1);


namespace App\Application\Product\Handler;

use App\Application\Product\Query\GetAllProductQuery;
use App\Domain\Product\Reader\ProductReaderInterface;

final readonly class GetAllProductHandler
{
    public function __construct(private ProductReaderInterface $reader)
    {
    }

    public function handle(GetAllProductQuery $query): array
    {
        return $this->reader->getAll($query->filter);
    }
}

<?php

declare(strict_types=1);


namespace App\Application\Product\Handler;

use App\Domain\Product\Reader\ProductReaderInterface;
use App\Domain\Product\ValueObject\ProductId;

final readonly class GetProductHandler
{
    public function __construct(private ProductReaderInterface $reader)
    {
    }

    public function handle(string $id): ?array
    {
        $productId = ProductId::fromString($id);
        $product = $this->reader->find($productId);

        if ($product === null) {
            return null;
        }

        return $product;
    }
}

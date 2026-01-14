<?php

declare(strict_types=1);

namespace App\Application\Product\Service;

use App\Domain\Product\Entity\Product;
use App\Domain\Product\Repository\ProductRepositoryInterface;

final readonly class ProductService
{
    public function __construct(private ProductRepositoryInterface $repository)
    {
    }

    public function create(Product $product): void
    {
        $this->repository->save($product);
    }
}

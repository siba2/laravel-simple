<?php

declare(strict_types=1);

namespace App\Application\Product\Service;

use App\Domain\Product\Entity\Product;
use App\Domain\Product\Repository\ProductRepositoryInterface;
use App\Domain\Product\ValueObject\ProductId;

final readonly class ProductService
{
    public function __construct(private ProductRepositoryInterface $repository)
    {
    }

    public function create(Product $product): void
    {
        $this->repository->save($product);
    }

    public function find(ProductId $id): ?Product
    {
        return $this->repository->find($id);
    }
}

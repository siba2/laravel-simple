<?php

declare(strict_types=1);

namespace App\Application\Product\Service;

use App\Domain\Customer\Entity\Customer;
use App\Domain\Product\Entity\Product;
use App\Domain\Product\Repository\ProductRepositoryInterface;
use App\Domain\Product\ValueObject\ProductId;
use App\Domain\Shared\ValueObject\Money;

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

    public function update(Product $product, string $name, Money $price): void
    {
        $product->update($name, $price);

        $this->repository->save($product);
    }

    public function remove(Product $product): void
    {
        $product->remove();

        $this->repository->remove($product);
    }
}

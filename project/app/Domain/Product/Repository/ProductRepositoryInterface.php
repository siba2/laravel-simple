<?php

namespace App\Domain\Product\Repository;

use App\Domain\Product\Entity\Product;
use App\Domain\Product\ValueObject\ProductId;

interface ProductRepositoryInterface
{
    public function save(Product $product): void;
    public function find(ProductId $id): ?Product;
    public function delete(Product $product): void;

}

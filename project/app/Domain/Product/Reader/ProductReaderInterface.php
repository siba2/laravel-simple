<?php

namespace App\Domain\Product\Reader;


use App\Domain\Product\Entity\Product;
use App\Domain\Product\ValueObject\ProductId;

interface ProductReaderInterface
{
    public function find(ProductId $id): ?Product;
    public function getAll(): array;

}

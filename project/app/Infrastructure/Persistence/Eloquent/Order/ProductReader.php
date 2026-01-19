<?php

declare(strict_types=1);


namespace App\Infrastructure\Persistence\Eloquent\Order;


use App\Application\Product\DTO\ProductFilter;
use App\Domain\Product\Entity\Product;
use App\Domain\Product\Reader\ProductReaderInterface;
use App\Domain\Product\ValueObject\ProductId;
use App\Infrastructure\Persistence\Eloquent\Product\ProductModel;

final class ProductReader implements ProductReaderInterface
{

    public function find(ProductId $id): ?Product
    {
        return ProductModel::find($id);
    }

    public function getAll(ProductFilter $filter): array
    {
        return ProductModel::filter($filter);
    }
}

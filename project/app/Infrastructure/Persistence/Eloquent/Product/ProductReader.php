<?php

declare(strict_types=1);


namespace App\Infrastructure\Persistence\Eloquent\Product;

use App\Application\Product\DTO\ProductFilter;
use App\Domain\Product\Reader\ProductReaderInterface;
use App\Domain\Product\ValueObject\ProductId;

final class ProductReader implements ProductReaderInterface
{

    public function find(ProductId $id): ?array
    {
        $model = ProductModel::find($id);

        if ($model === null) {
            return null;
        }

        return $model->toArray();
    }

    public function getAll(ProductFilter $filter): array
    {
        return ProductModel::query()
            ->filter($filter)
            ->get()
            ->toArray();
    }
}

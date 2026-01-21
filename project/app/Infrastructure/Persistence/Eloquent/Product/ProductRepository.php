<?php

declare(strict_types=1);


namespace App\Infrastructure\Persistence\Eloquent\Product;

use App\Domain\Product\Entity\Product;
use App\Domain\Product\Repository\ProductRepositoryInterface;
use App\Domain\Product\ValueObject\ProductId;

final class ProductRepository implements ProductRepositoryInterface
{
    public function save(Product $product): void
    {
        $model = ProductModel::updateOrCreate(
            ['id' => $product->id()->value()],
            [
                'name' => $product->name(),
                'amount' => $product->price()->amount(),
                'currency' => $product->price()->currency()
            ]
        );

        $model->save();
    }

    public function find(ProductId $id): ?Product
    {
        $model = ProductModel::find($id->value());

        if (!$model) {
            return null;
        }

        return ProductModel::mapToEntity($model);
    }

    public function remove(Product $product): void
    {
        $model = ProductModel::updateOrCreate(
            ['id' => $product->id()->value()],
            [
                'deletedAt' => $product->getDeletedAt()
            ]
        );

        $model->save();
    }
}

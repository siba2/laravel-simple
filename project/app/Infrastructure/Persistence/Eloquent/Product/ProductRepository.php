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
        $model = ProductModel::create([
            'id' => $product->id()->value(),
            'name' => $product->name(),
            'amount' => $product->price()->amount(),
            'currency' => $product->price()->currency(),
        ]);

        $model->save();
    }

    public function find(ProductId $id): ?Product
    {
       return null;
    }

    public function delete(Product $product): void
    {
        // TODO: Implement delete() method.
    }
}

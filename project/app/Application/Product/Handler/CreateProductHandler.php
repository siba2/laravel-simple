<?php

declare(strict_types=1);


namespace App\Application\Product\Handler;

use App\Application\Product\Command\CreateProductCommand;
use App\Domain\Product\Entity\Product;
use App\Domain\Product\ValueObject\ProductId;

final class CreateProductHandler
{
    public function __construct(private ProductService $service)
    {

    }

    public function handle(CreateProductCommand $command): Product
    {
        $id = ProductId::generate();

        $product = Product::create(
            id: $id,
            name: $command->name,
            price: $command->price
        );

        $this->service->save($product);

        return $product;
    }
}

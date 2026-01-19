<?php

declare(strict_types=1);


namespace App\Application\Product\Handler;

use App\Application\Product\Command\CreateProductCommand;
use App\Application\Product\Service\CustomerService;
use App\Domain\Product\Entity\Product;
use App\Domain\Product\ValueObject\ProductId;

final readonly class UpdateProductHandler
{
    public function __construct(private CustomerService $service)
    {
    }

    public function handle(CreateProductCommand $command): Product
    {
        $dto = $command->dto;
        $id = ProductId::generate();

        $product = Product::create(
            id: $id,
            name: $dto->name,
            price: $dto->price
        );

        $this->service->create($product);

        return $product;
    }
}

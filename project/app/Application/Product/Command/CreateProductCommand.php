<?php

declare(strict_types=1);

namespace App\Application\Product\Command;

use App\API\Command\CreateProductInterface;
use App\Application\Product\DTO\CreateProductDTO;
use App\Application\Product\Service\ProductService;
use App\Domain\Product\Entity\Product;
use App\Domain\Product\ValueObject\ProductId;

final readonly class CreateProductCommand implements CreateProductInterface
{
    public function __construct(private ProductService $service)
    {
    }

    public function __invoke(CreateProductDTO $dto): ProductId
    {
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

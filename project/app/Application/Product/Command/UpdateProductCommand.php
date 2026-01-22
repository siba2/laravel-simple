<?php

declare(strict_types=1);

namespace App\Application\Product\Command;

use App\API\Command\UpdateProductInterface;
use App\Application\Product\DTO\UpdateProductDTO;
use App\Application\Product\Exceptions\ProductNotFoundException;
use App\Application\Product\Service\ProductService;

final readonly class UpdateProductCommand implements UpdateProductInterface
{
    public function __construct(private ProductService $service)
    {
    }

    public function __invoke(UpdateProductDTO $dto): void
    {
        $product = $this->service->find($dto->id);

        if (null === $product) {
            throw new ProductNotFoundException($dto->id);
        }

        $this->service->update(
            product: $product,
            name: $dto->name,
            price: $dto->price
        );
    }
}

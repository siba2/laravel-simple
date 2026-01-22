<?php

declare(strict_types=1);

namespace App\Application\Product\Command;

use App\API\Command\RemoveProductInterface;
use App\Application\Exceptions\ProductNotFoundException;
use App\Application\Product\DTO\RemoveProductDTO;
use App\Application\Product\Service\ProductService;

final readonly class RemoveProductCommand implements RemoveProductInterface
{
    public function __construct(private ProductService $service)
    {
    }

    public function __invoke(RemoveProductDTO $dto): void
    {
        $product = $this->service->find($dto->id);

        if (null === $product) {
            throw new ProductNotFoundException($dto->id);
        }

        $this->service->remove(
            product: $product,
        );
    }
}

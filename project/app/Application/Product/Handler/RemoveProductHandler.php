<?php

declare(strict_types=1);


namespace App\Application\Product\Handler;

use App\Application\Product\Command\RemoveProductCommand;
use App\Application\Product\Exceptions\ProductNotFoundException;
use App\Application\Product\Service\ProductService;

final readonly class RemoveProductHandler
{
    public function __construct(private ProductService $service)
    {
    }

    public function handle(RemoveProductCommand $command): void
    {
        $dto = $command->dto;

        $product = $this->service->find($dto->id);

        if (null === $product) {
            throw new ProductNotFoundException($dto->id);
        }

        $this->service->remove(
            product: $product,
        );
    }
}

<?php

namespace App\API\Command;

use App\Application\Product\DTO\CreateProductDTO;
use App\Domain\Product\ValueObject\ProductId;

interface CreateProductInterface
{
    public function __invoke(CreateProductDTO $dto): ProductId;
}

<?php

namespace App\API\Command;

use App\Application\Product\DTO\UpdateProductDTO;
use App\Application\Product\Exceptions\ProductNotFoundException;

interface UpdateProductInterface
{
    /**
     * @throws ProductNotFoundException
     */
    public function __invoke(UpdateProductDTO $dto): void;
}

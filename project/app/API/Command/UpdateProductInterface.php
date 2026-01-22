<?php

namespace App\API\Command;

use App\Application\Exceptions\ProductNotFoundException;
use App\Application\Product\DTO\UpdateProductDTO;

interface UpdateProductInterface
{
    /**
     * @throws ProductNotFoundException
     */
    public function __invoke(UpdateProductDTO $dto): void;
}

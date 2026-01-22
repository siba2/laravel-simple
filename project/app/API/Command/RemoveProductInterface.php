<?php

namespace App\API\Command;

use App\Application\Product\DTO\RemoveProductDTO;
use App\Application\Product\Exceptions\ProductNotFoundException;

interface RemoveProductInterface
{
    /**
     * @throws ProductNotFoundException
     */
    public function __invoke(RemoveProductDTO $dto): void;
}

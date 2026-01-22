<?php

namespace App\API\Command;

use App\Application\Exceptions\ProductNotFoundException;
use App\Application\Product\DTO\RemoveProductDTO;

interface RemoveProductInterface
{
    /**
     * @throws ProductNotFoundException
     */
    public function __invoke(RemoveProductDTO $dto): void;
}

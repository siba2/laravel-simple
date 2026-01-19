<?php

declare(strict_types=1);

namespace App\Application\Product\Command;


use App\Application\Product\DTO\UpdateProductDTO;

final readonly class UpdateProductCommand
{
    public function __construct(
        public UpdateProductDTO $dto
    ) {}
}

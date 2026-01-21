<?php

declare(strict_types=1);

namespace App\Application\Product\Command;


use App\Application\Product\DTO\RemoveProductDTO;

final readonly class RemoveProductCommand
{
    public function __construct(
        public RemoveProductDTO $dto
    ) {}
}

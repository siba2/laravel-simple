<?php

declare(strict_types=1);


namespace App\Application\Product\DTO;

use App\Domain\Product\ValueObject\ProductId;

final readonly class RemoveProductDTO
{
    public function __construct(
        public ProductId $id
    ) {}

    public static function fromArray(string $id): self
    {
        return new self(ProductId::fromString($id));
    }
}

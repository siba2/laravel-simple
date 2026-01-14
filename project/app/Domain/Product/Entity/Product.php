<?php

declare(strict_types=1);


namespace App\Domain\Product\Entity;

use App\Domain\Product\ValueObject\ProductId;
use App\Domain\Shared\ValueObject\Money;

final class Product
{
    private function __construct(
        private ProductId $id,
        private string $name,
        private Money $price
    ) {}

    public static function create(ProductId $id, string $name, Money $price): self
    {
        return new self(
            id: $id,
            name: $name,
            price: $price
        );
    }

    public function id(): ProductId
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function price(): Money
    {
        return $this->price;
    }
}

<?php

declare(strict_types=1);

namespace App\Domain\Product\Entity;

use App\Domain\Product\ValueObject\ProductId;
use App\Domain\Shared\ValueObject\Money;

final class Product
{
    private \DateTimeImmutable $deletedAt;

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

    public static function from(ProductId $id, string $name, Money $price): self
    {
        return new self($id, $name, $price); //todo
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

    public function update(string $name, Money $price): void
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function remove(): void
    {
        $this->deletedAt = new \DateTimeImmutable();
    }

    public function getDeletedAt(): \DateTimeImmutable
    {
        return $this->deletedAt;
    }
}

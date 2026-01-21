<?php

declare(strict_types=1);


namespace App\Application\Product\DTO;

use App\Domain\Product\ValueObject\ProductId;
use App\Domain\Shared\ValueObject\Currency;
use App\Domain\Shared\ValueObject\Money;

final readonly class UpdateProductDTO
{
    public function __construct(
        public ProductId $id,
        public string $name,
        public Money $price
    ) {}

    public static function fromArray(string $id, array $data): self
    {
        $price = new Money((int) $data['price'] * 100, Currency::fromArray($data['currency']));

        return new self(ProductId::fromString($id), $data['name'], $price);
    }
}

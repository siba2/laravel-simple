<?php

declare(strict_types=1);


namespace App\Application\Product\DTO;

use App\Domain\Shared\ValueObject\Currency;
use App\Domain\Shared\ValueObject\Money;

final readonly class CreateProductDTO
{
    public function __construct(
        public string $name,
        public Money $price
    ) {}

    public static function fromArray(array $data): self
    {dump(11);
        $price = new Money((int) $data['price'] * 100, Currency::fromArray($data['currency']));

        return new self($data['name'], $price);
    }
}

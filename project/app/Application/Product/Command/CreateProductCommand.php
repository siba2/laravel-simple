<?php

declare(strict_types=1);


namespace App\Application\Product\Command;

use App\Domain\Shared\ValueObject\Currency;
use App\Domain\Shared\ValueObject\Money;

final readonly class CreateProductCommand
{
    public function __construct(
        public string $name,
        public Money $price,
        public Currency $currency
    ) {}
}

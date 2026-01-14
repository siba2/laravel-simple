<?php

declare(strict_types=1);


namespace App\Application\Order\DTO;

use App\Domain\Product\ValueObject\ProductId;
use InvalidArgumentException;

final readonly class OrderItemDTO
{
    public function __construct(
        public ProductId $productId,
        public int       $quantity,
    ) {
        if ($quantity <= 0) {//todo
            throw new InvalidArgumentException('Quantity must be > 0');
        }
    }

    public static function fromArray(array $data): self
    {
        return new self(
            ProductId::fromString($data['productId']),
            $data['quantity']
        );
    }
}

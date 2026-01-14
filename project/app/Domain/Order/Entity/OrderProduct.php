<?php

declare(strict_types=1);


namespace App\Domain\Order\Entity;

use App\Domain\Product\Entity\Product;
use App\Domain\Shared\ValueObject\Money;

final class OrderProduct
{
    private Money $totalPrice;

    public function __construct(
        private Product $product,
        private int $quantity
    ) {
        if ($quantity <= 0) {
            //todo
            throw new \InvalidArgumentException('Quantity must be greater than zero');
        }

        $this->totalPrice = $product->price()->multiply($quantity);
    }

    public function product(): Product
    {
        return $this->product;
    }

    public function quantity(): int
    {
        return $this->quantity;
    }

    public function totalPrice(): Money
    {
        return $this->totalPrice;
    }
}

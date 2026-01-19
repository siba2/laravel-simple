<?php

declare(strict_types=1);

namespace App\Domain\Order\Entity;

use App\Domain\Customer\Entity\Customer;
use App\Domain\Customer\ValueObject\CustomerId;
use App\Domain\Order\ValueObject\OrderId;
use App\Domain\Product\Entity\Product;
use App\Domain\Shared\ValueObject\Currency;
use App\Domain\Shared\ValueObject\Money;

final class Order
{
    /** @var OrderProduct[] */
    private array $products = [];

    private function __construct(
        private OrderId $id,
        private Customer $customer,
    ) {}


    public static function create(OrderId $id, Customer $customer): self
    {
        return new self($id, $customer);
    }

    public function id(): OrderId
    {
        return $this->id;
    }

    public function addProduct(Product $product, int $quantity): void
    {
        $this->products[] = new OrderProduct($product, $quantity);
    }

    /**
     * @return OrderProduct[]
     */
    public function products(): array
    {
        return $this->products;
    }

    public function totalPrice(): Money
    {
        $total = new Money(0, new Currency('PLN')); //todo pln

        foreach ($this->products as $item) {
            $total = $total->add($item->totalPrice());
        }

        return $total;
    }

    public function getCustomer(): Customer
    {
        return $this->customer;
    }
}

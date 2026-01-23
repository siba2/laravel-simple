<?php

declare(strict_types=1);

namespace App\Domain\Order\Entity;

use App\Domain\Customer\Entity\Customer;
use App\Domain\Order\ValueObject\OrderId;
use App\Domain\Order\ValueObject\OrderProductId;
use App\Domain\Order\ValueObject\OrderStatus;
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
        private OrderStatus $status
    ) {}


    public static function create(
        OrderId $id,
        Customer $customer,
        OrderStatus $status
    ): self
    {
        return new self($id, $customer, $status);
    }

    public static function from(
        OrderId $id,
        Customer $customer,
        OrderStatus $status
    ):self
    {
        return new self($id, $customer, $status);
    }

    public function id(): OrderId
    {
        return $this->id;
    }

    public function addProduct(OrderProductId $orderProductId, Product $product, int $quantity): void
    {
        $this->products[] = new OrderProduct($orderProductId, $product, $quantity);
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

    public function getStatus(): OrderStatus
    {
        return $this->status;
    }

    public function setStatus(OrderStatus $status): void
    {
        $this->status = $status;
    }
}

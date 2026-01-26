<?php

declare(strict_types=1);

namespace App\Application\Order\Command;

use App\API\Command\CreateOrderInterface;
use App\Application\Customer\Service\CustomerService;
use App\Application\Exceptions\CustomerNotFoundException;
use App\Application\Exceptions\ProductNotFoundException;
use App\Application\Order\DTO\CreateOrderDTO;
use App\Application\Order\Service\OrderService;
use App\Application\Product\Service\ProductService;
use App\Domain\Order\Entity\Order;
use App\Domain\Order\ValueObject\OrderId;
use App\Domain\Order\ValueObject\OrderProductId;
use App\Domain\Order\ValueObject\OrderStatus;
use App\Domain\Shared\Exceptions\DomainException;

final readonly class CreateOrderCommand implements CreateOrderInterface
{
    public function __construct(
        private OrderService $service,
        private ProductService $productService,
        private CustomerService $customerService,
    )
    {
    }

    public function __invoke(CreateOrderDTO $dto): OrderId
    {
        $customer = $this->customerService->find($dto->customerId);

        if (null === $customer) {
            throw new CustomerNotFoundException($dto->customerId);
        }

        $id = OrderId::generate();
        $order = Order::create(
            id: $id,
            customer: $customer,
            status: OrderStatus::PENDING,
            currency: $dto->currency
        );

        $order = $this->addProducts($order, $dto);

        $this->service->create($order);

        return $id;
    }

    /**
     * @throws DomainException
     * @throws ProductNotFoundException
     */
    private function addProducts(Order $order, CreateOrderDTO $dto): Order
    {
        foreach ($dto->items as $item) {
            $product = $this->productService->find($item->productId);

            if($product === null) {
                throw new ProductNotFoundException($item->productId);
            }

            $orderProductId = OrderProductId::generate();

            $order->addProduct($orderProductId, $product, $item->quantity);
        }

        return $order;
    }
}

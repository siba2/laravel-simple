<?php

declare(strict_types=1);


namespace App\Application\Order\Handler;


use _PHPStan_5adafcbb8\Nette\Neon\Exception;
use App\Application\Customer\Service\CustomerService;
use App\Application\Order\Command\CreateOrderCommand;
use App\Application\Order\Service\OrderService;
use App\Application\Product\Service\ProductService;
use App\Domain\Order\Entity\Order;
use App\Domain\Order\ValueObject\OrderId;

final readonly class CreateOrderHandler
{
    public function __construct(
        private OrderService $service,
        private ProductService $productService,
        private CustomerService $customerService,
    )
    {
    }

    public function handle(CreateOrderCommand $command): Order
    {
        $dto = $command->dto;

        $customer = $this->customerService->find($dto->customerId);

        if ($customer === null) {
            //todo
            throw new Exception('1');
        }

        $id = OrderId::generate();
        $order = Order::create(
            id: $id,
            customer: $customer
        );

        $errors = [];
        foreach ($dto->items as $item) {
           $product = $this->productService->find($item->productId);

           if($product === null) {
               $errors[] = "Product {$item->productId} not found"; // todo
           }

            $order->addProduct($product, $item->quantity);
        }

        if(!empty($errors)) {
            //todo
            throw new Exception('1');
        }

        $this->service->create($order);

        return $customer;
    }
}

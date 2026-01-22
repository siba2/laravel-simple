<?php

declare(strict_types=1);

namespace App\Application\Order\Command;

use App\API\Command\UpdateOrderInterface;
use App\Application\Customer\Service\CustomerService;
use App\Application\Order\DTO\UpdateOrderDTO;
use App\Application\Order\Service\OrderService;
use App\Application\Product\Service\ProductService;

final readonly class UpdateOrderCommand implements UpdateOrderInterface
{
    public function __construct(
        private OrderService $service,
        private ProductService $productService,
        private CustomerService $customerService,
    )
    {
    }

    public function __invoke(UpdateOrderDTO $dto): void
    {

    }
}

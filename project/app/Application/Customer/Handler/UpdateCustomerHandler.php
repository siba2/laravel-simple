<?php

declare(strict_types=1);


namespace App\Application\Customer\Handler;

use App\Application\Customer\Command\CreateCustomerCommand;
use App\Application\Customer\Service\CustomerService;
use App\Domain\Customer\Entity\Customer;
use App\Domain\Customer\ValueObject\CustomerId;
use App\Domain\Product\Entity\Product;

final readonly class UpdateCustomerHandler
{
    public function __construct(private CustomerService $service)
    {
    }

    public function handle(CreateCustomerCommand $command): Product
    {
        $dto = $command->dto;
        $id = CustomerId::generate();

        $customer = Customer::create(
            id: $id,
            name: $dto->name,
            email: $dto->email
        );

        $this->service->create($customer);

        return $customer;
    }
}

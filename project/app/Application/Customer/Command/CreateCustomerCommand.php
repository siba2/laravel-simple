<?php

declare(strict_types=1);

namespace App\Application\Customer\Command;

use App\API\Command\CreateCustomerInterface;
use App\Application\Customer\DTO\CreateCustomerDTO;
use App\Application\Customer\Service\CustomerService;
use App\Domain\Customer\Entity\Customer;
use App\Domain\Customer\ValueObject\CustomerId;

final readonly class CreateCustomerCommand implements CreateCustomerInterface
{
    public function __construct(private CustomerService $service)
    {
    }

    public function __invoke(CreateCustomerDTO $dto): CustomerId
    {
        $id = CustomerId::generate();

        $customer = Customer::create(
            id: $id,
            name: $dto->name,
            email: $dto->email
        );

        $this->service->create($customer);

        return $id;
    }
}

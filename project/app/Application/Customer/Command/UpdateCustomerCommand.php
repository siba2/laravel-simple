<?php

declare(strict_types=1);

namespace App\Application\Customer\Command;

use App\API\Command\UpdateCustomerInterface;
use App\Application\Customer\DTO\UpdateCustomerDTO;
use App\Application\Customer\Service\CustomerService;
use App\Application\Exceptions\CustomerNotFoundException;

final readonly class UpdateCustomerCommand implements UpdateCustomerInterface
{
    public function __construct(private CustomerService $service)
    {
    }

    public function __invoke(UpdateCustomerDTO $dto): void
    {
        $customer = $this->service->find($dto->id);

        if (null === $customer) {
            throw new CustomerNotFoundException($dto->id);
        }

        $this->service->update(
            customer: $customer,
            name: $dto->name,
            email: $dto->email
        );
    }
}

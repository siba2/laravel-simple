<?php

declare(strict_types=1);


namespace App\Application\Customer\Handler;

use App\Application\Customer\Command\RemoveCustomerCommand;
use App\Application\Customer\Service\CustomerService;
use App\Application\Customer\Exceptions\CustomerNotFoundException;

final readonly class RemoveCustomerHandler //todo interface
{
    public function __construct(private CustomerService $service)
    {
    }

    public function handle(RemoveCustomerCommand $command): void
    {
        $dto = $command->dto;

        $customer = $this->service->find($dto->id);

        if (null === $customer) {
            throw new CustomerNotFoundException($dto->id);
        }

        $this->service->remove(
            customer: $customer,
        );
    }
}

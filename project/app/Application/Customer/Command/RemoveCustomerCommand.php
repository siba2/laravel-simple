<?php

declare(strict_types=1);

namespace App\Application\Customer\Command;

use App\API\Command\RemoveCustomerInterface;
use App\Application\Customer\DTO\RemoveCustomerDTO;
use App\Application\Customer\Exceptions\CustomerNotFoundException;
use App\Application\Customer\Service\CustomerService;

final readonly class RemoveCustomerCommand implements RemoveCustomerInterface
{
    public function __construct(private CustomerService $service)
    {
    }

    public function __invoke(RemoveCustomerDTO $dto): void
    {
        $customer = $this->service->find($dto->id);

        if (null === $customer) {
            throw new CustomerNotFoundException($dto->id);
        }

        $this->service->remove(
            customer: $customer
        );
    }
}

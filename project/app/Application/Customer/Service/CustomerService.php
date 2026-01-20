<?php

declare(strict_types=1);

namespace App\Application\Customer\Service;


use App\Domain\Customer\Entity\Customer;
use App\Domain\Customer\Repository\CustomerRepositoryInterface;
use App\Domain\Customer\ValueObject\CustomerId;
use App\Domain\Shared\ValueObject\Email;

final readonly class CustomerService
{
    public function __construct(private CustomerRepositoryInterface $repository)
    {
    }

    public function create(Customer $customer): void
    {
        $this->repository->save($customer);
    }

    public function find(CustomerId $customerId): ?Customer
    {
       return $this->repository->find($customerId);
    }

    public function update(Customer $customer, string $name, Email $email): void
    {
        $customer->update($name, $email);

        $this->repository->save($customer);
    }

    public function remove(Customer $customer)
    {
        $customer->remove();

        $this->repository->remove($customer);
    }
}

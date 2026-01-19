<?php

declare(strict_types=1);

namespace App\Application\Customer\Service;


use App\Domain\Customer\Entity\Customer;
use App\Domain\Customer\Repository\CustomerRepositoryInterface;
use App\Domain\Customer\ValueObject\CustomerId;

final readonly class CustomerService
{
    public function __construct(private CustomerRepositoryInterface $repository)
    {
    }

    public function create(Customer $product): void
    {
        $this->repository->save($product);
    }

    public function find(CustomerId $customerId): ?Customer
    {
       return $this->repository->find($customerId);
    }
}

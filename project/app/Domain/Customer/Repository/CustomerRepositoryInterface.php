<?php

namespace App\Domain\Customer\Repository;

use App\Domain\Customer\Entity\Customer;
use App\Domain\Customer\ValueObject\CustomerId;

interface CustomerRepositoryInterface
{
    public function save(Customer $customer): void;
    public function find(CustomerId $id): ?Customer;
    public function delete(Customer $customer): void;

}

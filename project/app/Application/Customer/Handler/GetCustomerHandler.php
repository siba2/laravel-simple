<?php

declare(strict_types=1);


namespace App\Application\Customer\Handler;

use App\Domain\Customer\Reader\CustomerReaderInterface;
use App\Domain\Customer\ValueObject\CustomerId;

final readonly class GetCustomerHandler
{
    public function __construct(private CustomerReaderInterface $reader)
    {
    }

    public function handle(string $id): ?array
    {
        $customerId = CustomerId::fromString($id);
        $customer = $this->reader->find($customerId);

        if ($customer === null) {
            return null;
        }

        return $customer;
    }
}

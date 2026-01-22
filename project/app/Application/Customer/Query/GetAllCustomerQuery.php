<?php

declare(strict_types=1);

namespace App\Application\Customer\Query;

use App\API\Query\GetAllCustomersInterface;
use App\Application\Customer\DTO\CustomerFilter;
use App\Domain\Customer\Reader\CustomerReaderInterface;

final readonly class GetAllCustomerQuery implements GetAllCustomersInterface
{
    public function __construct(private CustomerReaderInterface $reader)
    {
    }

    public function __invoke(CustomerFilter $filter): array
    {
        return $this->reader->getAll($filter);
    }
}

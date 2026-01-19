<?php

declare(strict_types=1);


namespace App\Application\Customer\Handler;

use App\Application\Customer\Query\GetAllCustomerQuery;
use App\Domain\Customer\Reader\CustomerReaderInterface;

final readonly class GetAllCustomerHandler
{
    public function __construct(private CustomerReaderInterface $reader)
    {
    }

    public function handle(GetAllCustomerQuery $query): array
    {
        return $this->reader->getAll($query->filter);
    }
}

<?php

declare(strict_types=1);

namespace App\Application\Customer\Query;

use App\Application\Customer\DTO\CustomerFilter;

final readonly class GetAllCustomerQuery
{
    public function __construct(
        public CustomerFilter $filter
    ) {}
}

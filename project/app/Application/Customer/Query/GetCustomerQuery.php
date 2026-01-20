<?php

declare(strict_types=1);

namespace App\Application\Customer\Query;

final readonly class GetCustomerQuery
{
    public function __construct(
        public GetCustomerDTO $dto
    ) {}
}

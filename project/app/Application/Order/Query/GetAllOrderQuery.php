<?php

declare(strict_types=1);

namespace App\Application\Order\Query;

use App\Application\Customer\DTO\CreateCustomerDTO;
use App\Application\Customer\Query\GetCustomerDTO;

final readonly class GetAllOrderQuery
{
    public function __construct(
        public GetCustomerDTO $dto
    ) {}
}

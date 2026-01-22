<?php

namespace App\API\Query;

use App\Application\Customer\DTO\CustomerFilter;

interface GetAllCustomersInterface
{
    public function __invoke(CustomerFilter $filter): array;
}

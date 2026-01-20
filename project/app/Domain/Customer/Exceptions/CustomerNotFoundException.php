<?php

declare(strict_types=1);


namespace App\Domain\Customer\Exceptions;

use App\Domain\Customer\ValueObject\CustomerId;
use App\Domain\Shared\Exceptions\DomainErrorCode;
use App\Domain\Shared\Exceptions\DomainException;

class CustomerNotFoundException extends DomainException
{
    public function __construct(CustomerId $id)
    {
        parent::__construct(
            DomainErrorCode::CUSTOMER_NOT_FOUND,
            "Customer with ID {$id->value()} not found."
        );
    }
}

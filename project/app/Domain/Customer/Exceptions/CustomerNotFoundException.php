<?php

declare(strict_types=1);


namespace App\Domain\Customer\Exceptions;

use App\Domain\Customer\ValueObject\CustomerId;
use App\Domain\Shared\Exceptions\ApplicationErrorCode;
use App\Domain\Shared\Exceptions\ApplicationException;

class CustomerNotFoundException extends ApplicationException
{
    public function __construct(CustomerId $id)
    {
        parent::__construct(
            ApplicationErrorCode::CUSTOMER_NOT_FOUND,
            "Customer with ID {$id->value()} not found."
        );
    }
}

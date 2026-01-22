<?php

declare(strict_types=1);


namespace App\Application\Exceptions;

use App\Application\Shared\Exceptions\ApplicationErrorCode;
use App\Application\Shared\Exceptions\ApplicationException;
use App\Domain\Customer\ValueObject\CustomerId;

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

<?php

declare(strict_types=1);


namespace App\Domain\Order\Exceptions;

use App\Domain\Order\ValueObject\OrderId;
use App\Domain\Shared\Exceptions\ApplicationErrorCode;
use App\Domain\Shared\Exceptions\ApplicationException;

class OrderNotFoundException extends ApplicationException
{
    public function __construct(OrderId $id)
    {
        parent::__construct(
            ApplicationErrorCode::ORDER_NOT_FOUND,
            "Order with ID {$id->value()} not found."
        );
    }
}

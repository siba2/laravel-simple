<?php

declare(strict_types=1);


namespace App\Application\Product\Exceptions;

use App\Application\Shared\Exceptions\ApplicationErrorCode;
use App\Application\Shared\Exceptions\ApplicationException;
use App\Domain\Product\ValueObject\ProductId;

class ProductNotFoundException extends ApplicationException
{
    public function __construct(ProductId $id)
    {
        parent::__construct(
            ApplicationErrorCode::PRODUCT_NOT_FOUND,
            "Product with ID {$id->value()} not found."
        );
    }
}

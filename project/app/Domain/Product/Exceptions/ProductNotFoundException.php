<?php

declare(strict_types=1);


namespace App\Domain\Product\Exceptions;

use App\Domain\Product\ValueObject\ProductId;
use App\Domain\Shared\Exceptions\ApplicationErrorCode;
use App\Domain\Shared\Exceptions\ApplicationException;

class ProductNotFoundException extends ApplicationException
{
    public function __construct(ProductId $productId)
    {
        parent::__construct(
            ApplicationErrorCode::PRODUCT_NOT_FOUND,
            "Product with ID {$productId->value()} not found."
        );
    }
}

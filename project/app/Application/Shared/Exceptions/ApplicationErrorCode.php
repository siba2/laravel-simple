<?php

declare(strict_types=1);


namespace App\Application\Shared\Exceptions;

enum ApplicationErrorCode: string
{
    case CUSTOMER_NOT_FOUND = 'customer.not_found';
    case PRODUCT_NOT_FOUND = 'product.not_found';
    case ID_IS_INVALID = 'id.is_invalid';
}

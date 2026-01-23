<?php

declare(strict_types=1);


namespace App\Domain\Shared\Exceptions;

enum DomainErrorCode: string
{
    case PRODUCT_NOT_FOUND = 'product_not_found';
    case ORDER_NOT_FOUND = 'order_not_found';
    case CUSTOMER_NOT_FOUND = 'customer_not_found';
    case EMAIL_IS_INVALID = 'email_is_invalid';
    case ID_IS_INVALID = 'id_is_invalid';
    case CURRENCY_IS_INVALID = 'currency_is_invalid';
}

<?php

declare(strict_types=1);


namespace App\Domain\Order\ValueObject;

enum OrderStatus: string
{
    case PENDING    = 'PENDING';
    case PAID       = 'PAID';
    case PROCESSING = 'PROCESSING';
    case SHIPPED    = 'SHIPPED';
    case COMPLETED  = 'COMPLETED';
    case CANCELLED  = 'CANCELLED';
}

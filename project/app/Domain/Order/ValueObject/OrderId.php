<?php

declare(strict_types=1);

namespace App\Domain\Order\ValueObject;

use App\Domain\Shared\ValueObject\BaseId;
use App\Domain\Shared\ValueObject\UuidGenerator;

final class OrderId extends BaseId
{
    use UuidGenerator;

    final public static function generate(): OrderId
    {
        return new OrderId(OrderId::generateValue());
    }
}

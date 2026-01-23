<?php

declare(strict_types=1);

namespace App\Domain\Order\ValueObject;

use App\Domain\Shared\Exceptions\DomainException;
use App\Domain\Shared\ValueObject\BaseId;
use App\Domain\Shared\ValueObject\UuidGenerator;

final class OrderProductId extends BaseId
{
    use UuidGenerator;

    /**
     * @throws DomainException
     */
    final public static function generate(): OrderProductId
    {
        return new OrderProductId(OrderProductId::generateValue());
    }
}

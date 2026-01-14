<?php

declare(strict_types=1);


namespace App\Domain\Order\ValueObject;


use App\Domain\Shared\ValueObject\BaseId;
use App\Domain\Shared\ValueObject\UlidGenerator;

final class OrderId extends BaseId
{
    use UlidGenerator;

    final public static function generate(): ProductId
    {
        return new ProductId(ProductId::generateValue());
    }
}

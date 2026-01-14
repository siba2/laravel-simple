<?php

declare(strict_types=1);


namespace App\Domain\Product\ValueObject;

use App\Domain\Shared\ValueObject\BaseId;
use App\Domain\Shared\ValueObject\UuidGenerator;

final class ProductId extends BaseId
{
    use UuidGenerator;

    final public static function generate(): ProductId
    {
        return new ProductId(ProductId::generateValue());
    }
}

<?php

declare(strict_types=1);


namespace App\Domain\Product\ValueObject;


use App\Domain\Shared\ValueObject\BaseId;
use App\Domain\Shared\ValueObject\UlidGenerator;

final class ProductId extends BaseId
{
    use UlidGenerator;

    final public static function generate(): ProductId
    {
        return new ProductId(ProductId::generateValue());
    }
}

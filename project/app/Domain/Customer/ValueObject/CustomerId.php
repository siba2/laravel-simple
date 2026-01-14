<?php

declare(strict_types=1);


namespace App\Domain\Customer\ValueObject;

use App\Domain\Shared\ValueObject\BaseId;
use App\Domain\Shared\ValueObject\UuidGenerator;

final class CustomerId extends BaseId
{
    use UuidGenerator;

    final public static function generate(): CustomerId
    {
        return new CustomerId(CustomerId::generateValue());
    }
}

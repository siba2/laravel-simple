<?php

declare(strict_types=1);


namespace App\Domain\Shared\ValueObject;

use Illuminate\Support\Str;

trait UuidGenerator
{
    protected static function generateValue(): string
    {
        return (string) Str::uuid();
    }

    protected static function isValid(string $value): bool
    {
        return preg_match(
                '/^[0-9a-f]{8}-[0-9a-f]{4}-[1-5][0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/i',
                $value
            ) === 1;
    }
}

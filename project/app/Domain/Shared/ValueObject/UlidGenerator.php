<?php

declare(strict_types=1);


namespace App\Domain\Shared\ValueObject;


trait UlidGenerator
{
    protected static function generateValue(): string
    {
        $time = (int) (microtime(true) * 1000);
        $timeChars = self::encodeTime($time);

        $random = '';
        for ($i = 0; $i < 16; $i++) {
            $random .= self::CROCKFORD[random_int(0, 31)];
        }

        return $timeChars . $random;
    }

    protected static function isValid(string $value): bool
    {
        return preg_match('/^[0-9A-HJKMNP-TV-Z]{26}$/', $value) === 1;
    }

    private const CROCKFORD = '0123456789ABCDEFGHJKMNPQRSTVWXYZ';

    private static function encodeTime(int $time): string
    {
        $chars = '';

        for ($i = 0; $i < 10; $i++) {
            $chars = self::CROCKFORD[$time % 32] . $chars;
            $time = intdiv($time, 32);
        }

        return $chars;
    }
}

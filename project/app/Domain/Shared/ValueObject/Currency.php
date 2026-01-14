<?php

declare(strict_types=1);


namespace App\Domain\Shared\ValueObject;

final class Currency
{
    private const SUPPORTED = [
        'PLN',
        'EUR',
        'USD',
        'GBP',
    ];

    private string $code;

    public function __construct(string $code)
    {
        $code = strtoupper($code);

        if (!preg_match('/^[A-Z]{3}$/', $code)) {
            //todo
            throw new \InvalidArgumentException('Invalid currency code format');
        }

        if (!in_array($code, self::SUPPORTED, true)) {
            //todo
            throw new \InvalidArgumentException('Unsupported currency');
        }

        $this->code = $code;
    }

    public static function PLN(): self
    {
        return new self('PLN');
    }

    public static function EUR(): self
    {
        return new self('EUR');
    }

    public static function USD(): self
    {
        return new self('USD');
    }

    public function code(): string
    {
        return $this->code;
    }

    public function equals(self $currency): bool
    {
        return $this->code === $currency->code;
    }

    public function __toString(): string
    {
        return $this->code;
    }

    public static function fromArray(string $currency): self
    {
        return new self($currency);
    }
}

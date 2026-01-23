<?php

declare(strict_types=1);


namespace App\Domain\Shared\ValueObject;

use App\Domain\Shared\Exceptions\DomainErrorCode;
use App\Domain\Shared\Exceptions\DomainException;

final class Currency
{
    private const SUPPORTED = [
        'PLN',
        'EUR',
        'USD',
        'GBP',
    ];

    private string $code;

    /**
     * @throws DomainException
     */
    public function __construct(string $code)
    {
        $code = strtoupper($code);

        if (!preg_match('/^[A-Z]{3}$/', $code)) {
            throw new DomainException(DomainErrorCode::CURRENCY_IS_INVALID);
        }

        if (!in_array($code, self::SUPPORTED, true)) {
            throw new DomainException(DomainErrorCode::CURRENCY_IS_INVALID);
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

    /**
     * @throws DomainException
     */
    public static function fromArray(string $currency): self
    {
        return new self($currency);
    }
}

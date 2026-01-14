<?php

declare(strict_types=1);


namespace App\Domain\Shared\ValueObject;

use InvalidArgumentException;

abstract class BaseId
{
    protected string $value;

    final protected function __construct(string $value)
    {
        if (!static::isValid($value)) {
            throw new InvalidArgumentException(
                sprintf('Invalid %s value', static::class)
            );
        }

        $this->value = $value;
    }

    final public static function fromString(string $value): static
    {
        return new static($value);
    }

    final public function value(): string
    {
        return $this->value;
    }

    final public function equals(BaseId $other): bool
    {
        return static::class === $other::class
            && $this->value === $other->value;
    }

    final public function __toString(): string
    {
        return $this->value;
    }

    abstract protected static function isValid(string $value): bool;

    abstract protected static function generateValue(): string;
}

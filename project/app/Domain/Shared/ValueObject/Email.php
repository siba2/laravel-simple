<?php

namespace App\Domain\Shared\ValueObject;

use DomainException;

final class Email
{
    private string $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function fromString(string $email): self
    {
        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new DomainException("Invalid email address: {$email}");
        }

        return new self($email);
    }

    public function value(): string
    {
        return $this->value;
    }

    public function equals(Email $other): bool
    {
        return strtolower($this->value) === strtolower($other->value);
    }

    public function __toString(): string
    {
        return $this->value;
    }
}

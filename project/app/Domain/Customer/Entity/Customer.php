<?php

namespace App\Domain\Customer\Entity;

use App\Domain\Customer\ValueObject\CustomerId;
use App\Domain\Shared\ValueObject\Email;
use DomainException;

final class Customer
{
    private bool $active;

    private function __construct(private CustomerId $id, private string $name, private Email $email)
    {
        $this->active = true;
    }

    public static function create(CustomerId $id, string $name, Email $email): self
    {
        return new self($id, $name, $email);
    }

    public static function from(CustomerId $id, string $name, Email $email, bool $active): self
    {
        $customer = new self($id, $name, $email);
        $customer->active = $active;
        return $customer;
    }

    public function id(): CustomerId
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function email(): Email
    {
        return $this->email;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function deactivate(): void
    {
        if (! $this->active) {//todo
            throw new DomainException('Customer is already deactivated.');
        }

        $this->active = false;
    }

    public function changeEmail(Email $newEmail): void
    {
        if ($this->email->equals($newEmail)) {//todo
            throw new DomainException('Email is the same as current.');
        }

        $this->email = $newEmail;
    }
}

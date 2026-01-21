<?php

namespace App\Domain\Customer\Entity;

use App\Domain\Customer\ValueObject\CustomerId;
use App\Domain\Shared\ValueObject\Email;

final class Customer
{
    private bool $active;
    private \DateTimeImmutable $deletedAt;

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

    public function update(
        string $name,
        Email $email,
    ): void
    {
        $this->name = $name;
        $this->email = $email;
    }

    public function remove(): void
    {
        $this->deletedAt = new \DateTimeImmutable();
    }

    public function getDeletedAt(): \DateTimeImmutable
    {
        return $this->deletedAt;
    }
}

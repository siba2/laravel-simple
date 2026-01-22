<?php

declare(strict_types=1);

namespace App\Application\Customer\DTO;

use App\Domain\Shared\Exceptions\DomainException;
use App\Domain\Shared\ValueObject\Email;

final readonly class CreateCustomerDTO
{
    public function __construct(
        public string $name,
        public Email $email
    ) {}

    /**
     * @throws DomainException
     */
    public static function fromArray(array $data): self
    {
        return new self($data['name'], Email::fromString($data['email']));
    }
}

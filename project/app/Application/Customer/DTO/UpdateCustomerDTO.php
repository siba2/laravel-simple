<?php

declare(strict_types=1);

namespace App\Application\Customer\DTO;

use App\Domain\Customer\ValueObject\CustomerId;
use App\Domain\Shared\ValueObject\Email;

final readonly class UpdateCustomerDTO
{
    public function __construct(
        public CustomerId $id,
        public string $name,
        public Email $email
    ) {}

    public static function fromArray(string $id, array $data): self
    {
        return new self(
            id: CustomerId::fromString($id),
            name: $data['name'],
            email: Email::fromString($data['email']));
    }
}

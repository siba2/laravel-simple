<?php

declare(strict_types=1);

namespace App\Application\Customer\DTO;

use App\Domain\Customer\ValueObject\CustomerId;

final readonly class RemoveCustomerDTO
{
    public function __construct(
        public CustomerId $id,

    ) {}

    public static function fromArray(string $id): self
    {
        return new self(
            id: CustomerId::fromString($id)
        );
    }
}

<?php

declare(strict_types=1);

namespace App\Application\Customer\DTO;

final class GetCustomerDTO
{
    public function __construct(
        public string $id
    ) {}

    public static function fromArray(array $data): self
    {
        return new self($data['id']);
    }
}

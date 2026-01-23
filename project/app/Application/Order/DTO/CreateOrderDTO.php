<?php

declare(strict_types=1);


namespace App\Application\Order\DTO;

use App\Domain\Customer\ValueObject\CustomerId;
use App\Domain\Shared\Exceptions\DomainException;

final readonly class CreateOrderDTO
{
    public function __construct(
        public CustomerId $customerId,
        /** @var OrderItemDTO[] */
        public array $items,
    ) {}

    /**
     * @throws DomainException
     */
    public static function fromArray(array $data): self
    {
        return new self(
            CustomerId::fromString($data['customerId']),
            array_map(
                fn ($products) => OrderItemDTO::fromArray($products),
                $data['products']
            )
        );
    }
}

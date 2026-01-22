<?php

declare(strict_types=1);

namespace App\Application\Order\Query;

use App\API\Query\GetOrderInterface;
use App\Application\Shared\Exceptions\ApplicationErrorCode;
use App\Application\Shared\Exceptions\ApplicationException;
use App\Domain\Order\Reader\OrderReaderInterface;
use App\Domain\Order\ValueObject\OrderId;
use App\Domain\Shared\Exceptions\DomainException;

final readonly class GetOrderQuery implements GetOrderInterface
{
    public function __construct(private OrderReaderInterface $reader)
    {
    }

    public function __invoke(string $id): array
    {
        try {
            $orderId = OrderId::fromString($id);

        } catch (DomainException) {

            throw new ApplicationException(ApplicationErrorCode::ID_IS_INVALID);
        }

        return $this->reader->find($orderId);
    }
}

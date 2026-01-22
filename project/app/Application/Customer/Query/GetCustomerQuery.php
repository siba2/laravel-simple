<?php

declare(strict_types=1);


namespace App\Application\Customer\Query;

use App\API\Query\GetCustomerInterface;
use App\Application\Shared\Exceptions\ApplicationErrorCode;
use App\Application\Shared\Exceptions\ApplicationException;
use App\Domain\Customer\Reader\CustomerReaderInterface;
use App\Domain\Customer\ValueObject\CustomerId;
use App\Domain\Shared\Exceptions\DomainException;

final readonly class GetCustomerQuery implements GetCustomerInterface
{
    public function __construct(private CustomerReaderInterface $reader)
    {
    }

    public function __invoke(string $id): array
    {
        try {
            $customerId = CustomerId::fromString($id);
        }catch (DomainException){
            throw new ApplicationException(ApplicationErrorCode::ID_IS_INVALID);
        }

        $customer = $this->reader->find($customerId);

        if ($customer === null) {
            throw new ApplicationException(ApplicationErrorCode::CUSTOMER_NOT_FOUND);
        }

        return $customer;
    }
}

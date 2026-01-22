<?php

declare(strict_types=1);

namespace App\Application\Product\Query;

use App\API\Query\GetProductInterface;
use App\Application\Shared\Exceptions\ApplicationErrorCode;
use App\Application\Shared\Exceptions\ApplicationException;
use App\Domain\Product\Reader\ProductReaderInterface;
use App\Domain\Product\ValueObject\ProductId;
use App\Domain\Shared\Exceptions\DomainException;

final readonly class GetProductQuery implements GetProductInterface
{
    public function __construct(private ProductReaderInterface $reader)
    {
    }

    public function __invoke(string $id): array
    {
        try {
            $productId = ProductId::fromString($id);
        }catch (DomainException){
            throw new ApplicationException(ApplicationErrorCode::ID_IS_INVALID);
        }

        $product = $this->reader->find($productId);

        if ($product === null) {
            throw new ApplicationException(ApplicationErrorCode::CUSTOMER_NOT_FOUND);
        }

        return $product;
    }
}

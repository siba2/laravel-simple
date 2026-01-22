<?php

namespace App\API\Query;

use App\Application\Shared\Exceptions\ApplicationException;

interface GetProductInterface
{
    /**
     * @throws ApplicationException
     */
    public function __invoke(string $id): array;
}

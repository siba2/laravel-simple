<?php

declare(strict_types=1);


namespace App\Domain\Shared\Exceptions;

use Exception;

class DomainException extends Exception
{
    public function __construct(
        public DomainErrorCode $codeEnum,
        string $message = ""
    ) {
        $message = $message ?: $codeEnum->value;
        parent::__construct($message);
    }
}

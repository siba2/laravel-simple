<?php

declare(strict_types=1);


namespace App\Application\Shared\Exceptions;

use Exception;

class ApplicationException extends Exception
{
    public function __construct(
        public ApplicationErrorCode $codeEnum,
        string $message = ""
    ) {
        $message = $message ?: $codeEnum->value;
        parent::__construct($message);
    }
}

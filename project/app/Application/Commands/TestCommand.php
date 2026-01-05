<?php

declare(strict_types=1);


namespace App\Application\Commands;

final class TestCommand
{
    public function __construct(public string $name, public string $email)
    {
    }
}

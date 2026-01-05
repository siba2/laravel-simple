<?php

declare(strict_types=1);


namespace App\Domain\Test\Services;

use App\Domain\Test\Repositories\TestRepositoryInterface;

class TestService
{
    public function __construct(private TestRepositoryInterface $repository) {

    }

    public function test(string $name, string $email): string
    {
       return $name . ' ' . $email;
    }
}

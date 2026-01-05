<?php

declare(strict_types=1);


namespace App\Infrastructure\Repositories;

use App\Domain\Test\Repositories\TestRepositoryInterface;

class TestUserRepository implements TestRepositoryInterface
{

    public function save(string $name): void
    {
        dump($name . ' 123');
    }
}

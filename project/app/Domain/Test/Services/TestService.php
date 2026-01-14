<?php

declare(strict_types=1);


namespace App\Domain\Test\Services;

use App\Domain\Test\Entities\Test;
use App\Domain\Test\Repositories\TestRepositoryInterface;

readonly class TestService
{
    public function __construct(private TestRepositoryInterface $repository) {

    }

    public function create(string $name): void
    {
        $test = Test::create($name);

        $this->repository->save($test);
    }

    public function update(string $name): void
    {
        $this->repository->save($name);
    }
}

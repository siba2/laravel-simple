<?php

namespace App\Domain\Test\Repositories;

interface TestRepositoryInterface
{
    public function save(string $name): void;
}

<?php

namespace App\Domain\Test\Repositories;

use App\Domain\Test\Entities\Test;

interface TestRepositoryInterface
{
    public function save(Test $name): void;
    public function update(int $id, string $name): void;
}

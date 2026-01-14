<?php

declare(strict_types=1);


namespace App\Infrastructure\Repositories;

use App\Domain\Test\Entities\Test;
use App\Domain\Test\Repositories\TestRepositoryInterface;
use App\Infrastructure\Models\TestUser;

class TestUserRepository implements TestRepositoryInterface
{
    public function save(Test $test): void
    {
        TestUser::create([
            'name' => $test->getName(),
        ]);
    }

    public function update(int $id, string $name): void
    {
        $model = TestUser::find($id);
        $model->name = $name;
        $model->save();
    }

    public function delete(int $id): void
    {
        $model = TestUser::find($id);
        $model->delete();
    }
}

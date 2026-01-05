<?php

declare(strict_types=1);

namespace App\Providers;

use App\Application\Commands\TestCommandHandler;
use App\Domain\Test\Services\TestService;
use Illuminate\Support\ServiceProvider;

use App\Domain\Test\Repositories\TestRepositoryInterface;
use App\Infrastructure\Repositories\TestUserRepository;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(TestRepositoryInterface::class, TestUserRepository::class);

        $this->app->bind(TestService::class, function ($app) {
            return new TestService(
                $app->make(TestRepositoryInterface::class)
            );
        });

        $this->app->bind(TestCommandHandler::class, function ($app) {
            return new TestCommandHandler(
                $app->make(TestService::class)
            );
        });
    }

    public function boot(): void
    {
        //
    }
}

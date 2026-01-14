<?php

declare(strict_types=1);

namespace App\Providers;

use App\Application\Commands\Handlers\CreateOrderCommandHandler;
use App\Domain\Test\Repositories\TestRepositoryInterface;
use App\Domain\Test\Services\TestService;
use App\Infrastructure\Repositories\TestUserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //todo
        $this->app->bind(TestRepositoryInterface::class, TestUserRepository::class);

        $this->app->bind(TestService::class, function ($app) {
            return new TestService(
                $app->make(TestRepositoryInterface::class)
            );
        });

        $this->app->bind(CreateOrderCommandHandler::class, function ($app) {
            return new CreateOrderCommandHandler(
                $app->make(TestService::class)
            );
        });
    }

    public function boot(): void
    {
        //
    }
}

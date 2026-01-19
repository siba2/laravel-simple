<?php

declare(strict_types=1);

namespace App\Providers;

use App\Domain\Product\Repository\CustomerRepositoryInterface;
use App\Infrastructure\Persistence\Eloquent\Product\ProductRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(CustomerRepositoryInterface::class, ProductRepository::class);
    }

    public function boot(): void
    {
        //
    }
}

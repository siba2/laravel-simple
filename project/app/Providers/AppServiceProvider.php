<?php

declare(strict_types=1);

namespace App\Providers;

use App\Domain\Customer\Reader\CustomerReaderInterface;
use App\Domain\Customer\Repository\CustomerRepositoryInterface;
use App\Domain\Product\Repository\ProductRepositoryInterface;
use App\Infrastructure\Persistence\Eloquent\Customer\CustomerReader;
use App\Infrastructure\Persistence\Eloquent\Customer\CustomerRepository;
use App\Infrastructure\Persistence\Eloquent\Product\ProductRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {

        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);

        $this->app->bind(CustomerRepositoryInterface::class, CustomerRepository::class);
        $this->app->bind(CustomerReaderInterface::class, CustomerReader::class);
    }

    public function boot(): void
    {
        //
    }
}

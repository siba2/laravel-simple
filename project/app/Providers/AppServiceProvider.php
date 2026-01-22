<?php

declare(strict_types=1);

namespace App\Providers;

use App\API\Command\CreateOrderInterface;
use App\Application\Order\Command\CreateOrderCommand;
use App\Domain\Customer\Reader\CustomerReaderInterface;
use App\Domain\Customer\Repository\CustomerRepositoryInterface;
use App\Domain\Order\Repositories\OrderRepositoryInterface;
use App\Domain\Product\Repository\ProductRepositoryInterface;
use App\Infrastructure\Persistence\Eloquent\Customer\CustomerReader;
use App\Infrastructure\Persistence\Eloquent\Customer\CustomerRepository;
use App\Infrastructure\Persistence\Eloquent\Order\OrderRepository;
use App\Infrastructure\Persistence\Eloquent\Product\ProductRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        /**
         * Products
         */

        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);

        /**
         * Customers
         */

        $this->app->bind(CustomerRepositoryInterface::class, CustomerRepository::class);
        $this->app->bind(CustomerReaderInterface::class, CustomerReader::class);

        /**
         * Orders
         */

        $this->app->bind(CreateOrderInterface::class, CreateOrderCommand::class);

        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->bind(CustomerReaderInterface::class, CustomerReader::class);
    }

    public function boot(): void
    {
        //
    }
}

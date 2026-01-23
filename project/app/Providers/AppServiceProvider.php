<?php

declare(strict_types=1);

namespace App\Providers;

use App\API\Command\CreateCustomerInterface;
use App\API\Command\CreateOrderInterface;
use App\API\Command\CreateProductInterface;
use App\API\Command\RemoveCustomerInterface;
use App\API\Command\RemoveProductInterface;
use App\API\Command\UpdateCustomerInterface;
use App\API\Command\UpdateProductInterface;
use App\API\Query\GetAllCustomersInterface;
use App\API\Query\GetCustomerInterface;
use App\Application\Customer\Command\CreateCustomerCommand;
use App\Application\Customer\Command\RemoveCustomerCommand;
use App\Application\Customer\Command\UpdateCustomerCommand;
use App\Application\Customer\Query\GetAllCustomersQuery;
use App\Application\Customer\Query\GetCustomerQuery;
use App\Application\Order\Command\CreateOrderCommand;
use App\Application\Product\Command\CreateProductCommand;
use App\Application\Product\Command\RemoveProductCommand;
use App\Application\Product\Command\UpdateProductCommand;
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

        $this->app->bind(CreateProductInterface::class, CreateProductCommand::class);
        $this->app->bind(UpdateProductInterface::class, UpdateProductCommand::class);
        $this->app->bind(RemoveProductInterface::class, RemoveProductCommand::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);

        /**
         * Customers
         */
        $this->app->bind(CreateCustomerInterface::class, CreateCustomerCommand::class);
        $this->app->bind(UpdateCustomerInterface::class, UpdateCustomerCommand::class);
        $this->app->bind(RemoveCustomerInterface::class, RemoveCustomerCommand::class);
        $this->app->bind(GetAllCustomersInterface::class, GetAllCustomersQuery::class);
        $this->app->bind(GetCustomerInterface::class, GetCustomerQuery::class);

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

<?php

namespace App\Http\Controllers;

use App\Application\Product\Command\CreateProductCommand;
use App\Application\Product\Command\RemoveProductCommand;
use App\Application\Product\Command\UpdateProductCommand;
use App\Application\Product\DTO\CreateProductDTO;
use App\Application\Product\DTO\ProductFilter;
use App\Application\Product\DTO\RemoveProductDTO;
use App\Application\Product\DTO\UpdateProductDTO;
use App\Application\Product\Handler\CreateProductHandler;
use App\Application\Product\Handler\GetAllProductHandler;
use App\Application\Product\Handler\GetProductHandler;
use App\Application\Product\Handler\RemoveProductHandler;
use App\Application\Product\Handler\UpdateProductHandler;
use App\Application\Product\Query\GetAllProductQuery;
use App\Http\Requests\Product\CreateRequest;
use App\Http\Requests\Product\UpdateRequest;
use Illuminate\Http\Request;

final class ProductController extends ApiController
{

    public function getAll(Request $request, GetAllProductHandler $handler)
    {
        $filter = ProductFilter::fromArray($request->query());

        $query = new GetAllProductQuery($filter);
        $customers = $handler->handle($query);

        return $this->apiSuccess($customers);
    }

    public function store(CreateRequest $request, CreateProductHandler $handler)
    {
        $dto = CreateProductDTO::fromArray($request->validated());

        $command = new CreateProductCommand($dto);
        $product = $handler->handle($command);

        return $this->apiCreated($product);
    }

    public function show(string $id, GetProductHandler $handler)
    {
        $product = $handler->handle($id);

        return $this->apiSuccess([$product]);
    }

    public function update(string $id, UpdateRequest $request, UpdateProductHandler $handler)
    {
        $dto = UpdateProductDTO::fromArray($id, $request->validated());

        $command = new UpdateProductCommand($dto);
        $handler->handle($command);

        return $this->apiAccepted();
    }

    public function remove(string $id, RemoveProductHandler $handler)
    {
        $dto = RemoveProductDTO::fromArray($id);

        $command = new RemoveProductCommand($dto);
        $handler->handle($command);

        return $this->apiAccepted();
    }
}

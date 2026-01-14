<?php

namespace App\Http\Controllers;

use App\Application\Product\Command\CreateProductCommand;
use App\Application\Product\DTO\CreateCustomerDTO;
use App\Application\Product\Handler\CreateProductHandler;
use App\Http\Requests\Product\CreateRequest;

final class ProductController extends ApiController
{

    public function getAll()
    {

    }

    public function store(CreateRequest $request, CreateProductHandler $handler)
    {
        $dto = CreateCustomerDTO::fromArray($request->validated());

        $command = new CreateProductCommand($dto);
        $product = $handler->handle($command);

        return $this->apiCreated($product);
    }

    public function show(string $id)
    {

    }

    public function update(string $id)
    {

    }

    public function remove(string $id)
    {

    }
}

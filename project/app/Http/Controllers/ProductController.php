<?php

namespace App\Http\Controllers;

use App\Application\Product\DTO\CreateProductDTO;
use App\Http\Requests\Product\CreateRequest;

final class ProductController extends ApiController
{

    public function getAll()
    {

    }

    public function store(CreateRequest $request)
    {
        $dto = CreateProductDTO::fromArray($request->validated());

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

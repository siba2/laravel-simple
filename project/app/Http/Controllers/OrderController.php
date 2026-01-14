<?php

namespace App\Http\Controllers;

use App\Application\Order\DTO\CreateOrderDTO;
use App\Http\Requests\Order\CreateRequest;

final class OrderController extends ApiController
{

    public function getAll()
    {

    }

    public function store(CreateRequest $request)
    {
        $dto = CreateOrderDTO::fromArray($request->validated());

        dump($dto);
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

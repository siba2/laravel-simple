<?php

namespace App\Http\Controllers;

use App\Application\Order\Command\CreateOrderCommand;
use App\Application\Order\DTO\CreateOrderDTO;
use App\Application\Order\Handler\CreateOrderHandler;
use App\Http\Requests\Order\CreateRequest;

final class OrderController extends ApiController
{

    public function getAll()
    {

    }

    public function store(CreateRequest $request, CreateOrderHandler $handler)
    {
        $dto = CreateOrderDTO::fromArray($request->validated());

        $command = new CreateOrderCommand($dto);
        $order = $handler->handle($command); //todo try catch

        return $this->apiCreated($order);
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

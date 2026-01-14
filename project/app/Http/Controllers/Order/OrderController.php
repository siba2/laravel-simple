<?php

namespace App\Http\Controllers\Order;

use App\Application\Commands\CreateOrderCommand;
use App\Application\Commands\Handlers\CreateOrderCommandHandler;
use App\Http\Controllers\ApiController;
use App\Http\Requests\Order\CreateRequest;

final class OrderController extends ApiController
{

    public function getAll()
    {

    }

    public function store(CreateRequest $request)
    {
        try {
            $data = $request->validated();

            $command = new CreateOrderCommand(
                name: $data['name']
            );

            $id = app(CreateOrderCommandHandler::class)->handle($command);

        }catch (\Exception $exception){
            return $this->apiError('Failed to retrieve orders');
        }

        return $this->apiSuccess(
            data:[
                'id' => $id
            ],
            statusCode: 201
        );
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

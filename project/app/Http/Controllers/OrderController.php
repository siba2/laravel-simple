<?php

namespace App\Http\Controllers;

use App\API\Command\CreateOrderInterface;
use App\API\Query\GetAllOrdersInterface;
use App\API\Query\GetOrderInterface;
use App\Application\Exceptions\CustomerNotFoundException;
use App\Application\Exceptions\ProductNotFoundException;
use App\Application\Order\DTO\CreateOrderDTO;
use App\Application\Order\DTO\OrderFilter;
use App\Application\Shared\Exceptions\ApplicationException;
use App\Http\Requests\Order\CreateRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class OrderController extends ApiController
{

    public function getAll(Request $request, GetAllOrdersInterface $query): JsonResponse
    {
        $filter = OrderFilter::fromArray($request->query());

        $orders = ($query)($filter);

        return $this->apiSuccess($orders);
    }

    public function store(CreateRequest $request, CreateOrderInterface $command): JsonResponse
    {

        $dto = CreateOrderDTO::fromArray($request->validated());

        try {
            $orderId = ($command)($dto);

        } catch (CustomerNotFoundException|ProductNotFoundException $exception) {

            return $this->apiError($exception->getMessage());
        }

        return $this->apiCreated($orderId->value());
    }

    public function show(string $id, GetOrderInterface $query): JsonResponse
    {
        try{
            $order = ($query)($id);

        } catch (ApplicationException $exception) {

            return $this->apiError($exception->getMessage());
        }

        return $this->apiSuccess($order);
    }

    public function update(string $id): JsonResponse
    {
        return $this->apiSuccess();
    }

    public function remove(string $id): JsonResponse
    {
        return $this->apiSuccess();
    }
}

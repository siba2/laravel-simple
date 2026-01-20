<?php

namespace App\Http\Controllers;

use App\Application\Customer\Command\CreateCustomerCommand;
use App\Application\Customer\Command\RemoveCustomerCommand;
use App\Application\Customer\Command\UpdateCustomerCommand;
use App\Application\Customer\DTO\CreateCustomerDTO;
use App\Application\Customer\DTO\CustomerFilter;
use App\Application\Customer\DTO\RemoveCustomerDTO;
use App\Application\Customer\DTO\UpdateCustomerDTO;
use App\Application\Customer\Handler\CreateCustomerHandler;
use App\Application\Customer\Handler\GetAllCustomerHandler;
use App\Application\Customer\Handler\GetCustomerHandler;
use App\Application\Customer\Handler\RemoveCustomerHandler;
use App\Application\Customer\Handler\UpdateCustomerHandler;
use App\Application\Customer\Query\GetAllCustomerQuery;
use App\Http\Requests\Customer\CreateRequest;
use App\Http\Requests\Customer\UpdateRequest;
use Illuminate\Http\Request;

final class CustomerController extends ApiController
{

    public function getAll(Request $request, GetAllCustomerHandler $handler)
    {
        $filter = CustomerFilter::fromArray($request->query());

        $query = new GetAllCustomerQuery($filter);
        $customers = $handler->handle($query);

        return $this->apiSuccess($customers);
    }

    public function store(CreateRequest $request, CreateCustomerHandler $handler)
    {
        $dto = CreateCustomerDTO::fromArray($request->validated());

        $command = new CreateCustomerCommand($dto);
        $customerId = $handler->handle($command);

        return $this->apiCreated(['id' => $customerId->value()]);
    }

    public function show(string $id, GetCustomerHandler $handler)
    {
        $customer = $handler->handle($id);

        return $this->apiSuccess([$customer]);
    }

    public function update(string $id, UpdateRequest $request, UpdateCustomerHandler $handler)
    {
        $dto = UpdateCustomerDTO::fromArray($id, $request->validated());

        $command = new UpdateCustomerCommand($dto);
        $handler->handle($command);

        return $this->apiAccepted();
    }

    public function remove(string $id, RemoveCustomerHandler $handler)
    {
        $dto = RemoveCustomerDTO::fromArray($id);

        $command = new RemoveCustomerCommand($dto);
        $handler->handle($command);

        return $this->apiAccepted();
    }
}

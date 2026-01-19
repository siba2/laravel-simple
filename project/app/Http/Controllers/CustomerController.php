<?php

namespace App\Http\Controllers;

use App\Application\Customer\Command\CreateCustomerCommand;
use App\Application\Customer\DTO\CreateCustomerDTO;
use App\Application\Customer\Handler\CreateCustomerHandler;
use App\Http\Requests\Customer\CreateRequest;

final class CustomerController extends ApiController
{

    public function getAll()
    {

    }

    public function store(CreateRequest $request, CreateCustomerHandler $handler)
    {
        $dto = CreateCustomerDTO::fromArray($request->validated());

        $command = new CreateCustomerCommand($dto);
        $customer= $handler->handle($command);

        return $this->apiCreated($customer);
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

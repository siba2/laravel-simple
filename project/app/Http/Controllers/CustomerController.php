<?php

namespace App\Http\Controllers;

use App\Application\Customer\Command\CreateCustomerCommand;
use App\Application\Customer\DTO\CreateCustomerDTO;
use App\Application\Customer\DTO\CustomerFilter;
use App\Application\Customer\Handler\CreateCustomerHandler;
use App\Application\Customer\Handler\GetAllCustomerHandler;
use App\Application\Customer\Query\GetAllCustomerQuery;
use App\Http\Requests\Customer\CreateRequest;
use App\Infrastructure\Persistence\Eloquent\Customer\CustomerModel;
use Illuminate\Http\Request;

final class CustomerController extends ApiController
{

    public function getAll(Request $request, GetAllCustomerHandler $handler)
    {
        $filter = CustomerFilter::fromArray($request->query());

        $query = new GetAllCustomerQuery($filter);
        $customers = $handler->handle($query);

        return $this->apiSuccess($customers);;
    }

    public function store(CreateRequest $request, CreateCustomerHandler $handler)
    {
        $dto = CreateCustomerDTO::fromArray($request->validated());

        $command = new CreateCustomerCommand($dto);
        $customer = $handler->handle($command);

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

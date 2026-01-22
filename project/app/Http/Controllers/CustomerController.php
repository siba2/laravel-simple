<?php

namespace App\Http\Controllers;

use App\API\Command\CreateCustomerInterface;
use App\API\Command\RemoveCustomerInterface;
use App\API\Command\UpdateCustomerInterface;
use App\API\Query\GetAllCustomersInterface;
use App\API\Query\GetCustomerInterface;
use App\Application\Customer\DTO\CreateCustomerDTO;
use App\Application\Customer\DTO\CustomerFilter;
use App\Application\Customer\DTO\RemoveCustomerDTO;
use App\Application\Customer\DTO\UpdateCustomerDTO;
use App\Application\Exceptions\CustomerNotFoundException;
use App\Application\Shared\Exceptions\ApplicationException;
use App\Domain\Shared\Exceptions\DomainException;
use App\Http\Requests\Customer\CreateRequest;
use App\Http\Requests\Customer\UpdateRequest;
use Illuminate\Http\Request;

final class CustomerController extends ApiController
{

    public function getAll(Request $request, GetAllCustomersInterface $query)
    {
        $filter = CustomerFilter::fromArray($request->query());

        $customers = ($query)($filter);

        return $this->apiSuccess($customers);
    }

    public function store(CreateRequest $request, CreateCustomerInterface $command)
    {
        try {
            $dto = CreateCustomerDTO::fromArray($request->validated());

        }catch (DomainException $exception){

            return $this->apiUnprocessableEntity($exception->getMessage());
        }

        $customerId = ($command)($dto);

        return $this->apiCreated(['id' => $customerId->value()]);
    }

    public function show(string $id, GetCustomerInterface $query)
    {
        try {
            $customer = ($query)($id);
        } catch (ApplicationException $exception) {
            return $this->apiError($exception->getMessage());
        }

        return $this->apiSuccess($customer);
    }

    public function update(string $id, UpdateRequest $request, UpdateCustomerInterface $command)
    {
        $dto = UpdateCustomerDTO::fromArray($id, $request->validated());

        try{
            ($command)($dto);

        } catch (CustomerNotFoundException $exception) {

            return $this->apiNotFound($exception->getMessage());
        }

        return $this->apiAccepted();
    }

    public function remove(string $id, RemoveCustomerInterface $command)
    {
        $dto = RemoveCustomerDTO::fromArray($id);

        try{
            ($command)($dto);

        } catch (CustomerNotFoundException $exception) {

            return $this->apiNotFound($exception->getMessage());
        }

        return $this->apiAccepted();
    }
}

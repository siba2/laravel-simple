<?php

namespace App\Http\Controllers;

use App\API\Command\CreateProductInterface;
use App\API\Command\RemoveProductInterface;
use App\API\Command\UpdateProductInterface;
use App\API\Query\GetAllProductsInterface;
use App\API\Query\GetProductInterface;
use App\Application\Product\DTO\CreateProductDTO;
use App\Application\Product\DTO\ProductFilter;
use App\Application\Product\DTO\RemoveProductDTO;
use App\Application\Product\DTO\UpdateProductDTO;
use App\Application\Product\Exceptions\ProductNotFoundException;
use App\Application\Shared\Exceptions\ApplicationException;
use App\Http\Requests\Product\CreateRequest;
use App\Http\Requests\Product\UpdateRequest;
use Illuminate\Http\Request;

final class ProductController extends ApiController
{

    public function getAll(Request $request, GetAllProductsInterface $query)
    {
        $filter = ProductFilter::fromArray($request->query());

        $customers = ($query)($filter);

        return $this->apiSuccess($customers);
    }

    public function store(CreateRequest $request, CreateProductInterface $command)
    {
        $dto = CreateProductDTO::fromArray($request->validated());

        $productId = ($command)($dto);

        return $this->apiCreated($productId->value());
    }

    public function show(string $id, GetProductInterface $query)
    {
        try {
            $product = ($query)($id);

        } catch (ApplicationException $exception) {

            return $this->apiError($exception->getMessage());
        }

        return $this->apiSuccess($product);
    }

    public function update(string $id, UpdateRequest $request, UpdateProductInterface $command)
    {
        $dto = UpdateProductDTO::fromArray($id, $request->validated());

        try{
            ($command)($dto);

        } catch (ProductNotFoundException $exception) {

            return $this->apiNotFound($exception->getMessage());
        }

        return $this->apiAccepted();
    }

    public function remove(string $id, RemoveProductInterface $command)
    {
        $dto = RemoveProductDTO::fromArray($id);

        try{
            ($command)($dto);

        } catch (ProductNotFoundException $exception) {

            return $this->apiNotFound($exception->getMessage());
        }

        return $this->apiAccepted();
    }
}

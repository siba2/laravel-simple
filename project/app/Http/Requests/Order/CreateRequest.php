<?php

namespace App\Http\Requests\Order;

use App\Http\Requests\ApiRequest;

class CreateRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'customerId' => 'required',
            'products' => 'required',
            'products.*.productId' => ['required'],
            'products.*.quantity' => ['required', 'integer', 'min:1'],
            'currency' => ['required', 'string', 'min:3', 'max:3'],
        ];
    }
}

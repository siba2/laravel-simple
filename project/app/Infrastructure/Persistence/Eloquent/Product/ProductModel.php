<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Eloquent\Product;

use App\Domain\Shared\ValueObject\Currency;
use App\Domain\Shared\ValueObject\Money;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = 'products';

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'name',
        'amount',
        'currency',
    ];

    protected $casts = [
        'amount' => 'integer',
        'currency' => 'string',
    ];

    public function priceMoney(): Money
    {
        return new Money(
            $this->amount,
            Currency::fromCode($this->currency)
        );
    }
}

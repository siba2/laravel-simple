<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Eloquent\Product;

use App\Application\Product\DTO\ProductFilter;
use App\Domain\Product\Entity\Product;
use App\Domain\Product\ValueObject\ProductId;
use App\Domain\Shared\ValueObject\Currency;
use App\Domain\Shared\ValueObject\Money;
use Illuminate\Database\Eloquent\Model;

final class ProductModel extends Model
{
    protected $table = 'products';

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'name',
        'amount',
        'currency',
        'deletedAt'
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

    public function scopeFilter($query, ProductFilter $filter)
    {
        $query->where('deletedAt', null);

        if ($filter->search) {
            $query->where('id', 'like', "%{$filter->search}%")
                ->orWhere('customer_id', 'like', "%{$filter->search}%");
        }

        return $query;
    }

    public static function mapToEntity(ProductModel $model): Product
    {
        return Product::from(
            id: ProductId::fromString($model->id),
            name: $model->name,
            price: new Money(
                amount: $model->amount,
                currency: Currency::fromArray($model->currency)
            ),
        );
    }
}

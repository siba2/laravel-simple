<?php

declare(strict_types=1);


namespace App\Infrastructure\Persistence\Eloquent\Order;

use App\Application\Order\DTO\OrderFilter;
use App\Domain\Order\Entity\Order;
use App\Domain\Order\ValueObject\OrderId;
use App\Domain\Order\ValueObject\OrderStatus;
use App\Infrastructure\Persistence\Eloquent\Product\ProductModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class OrderModel extends Model
{
    protected $table = 'orders';

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'customer_id',
        'total_price',
        'currency',
        'status',
    ];

    protected $casts = [
        'status' => OrderStatus::class,
    ];

    public function products(): HasMany
    {
        return $this->hasMany(ProductModel::class);
    }

    public function scopeFilter($query, OrderFilter $filter)
    {
        if ($filter->status) {
            $query->where('status', $filter->status);
        }

        if ($filter->search) {
            $query->where('id', 'like', "%{$filter->search}%")
                ->orWhere('customer_id', 'like', "%{$filter->search}%");
        }

        return $query;
    }

    public static function mapToEntity(OrderModel $model): Order
    {
        return Order::from(
            id: OrderId::fromString($model->id),
            customer: $model->customer_id,
            status: $model->status,
        );
    }
}

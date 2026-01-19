<?php

declare(strict_types=1);


namespace App\Infrastructure\Persistence\Eloquent\Order;

use App\Application\Order\DTO\OrderFilter;
use App\Domain\Order\ValueObject\OrderStatus;
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

    public function items(): HasMany
    {
        return $this->hasMany(OrderItemModel::class, 'order_id');
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
}

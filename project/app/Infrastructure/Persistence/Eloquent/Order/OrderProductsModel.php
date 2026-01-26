<?php

declare(strict_types=1);


namespace App\Infrastructure\Persistence\Eloquent\Order;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class OrderProductsModel extends Model
{
    protected $table = 'order_products';

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'order_id',
        'product_id',
        'quantity',
        'unit_price',
        'currency',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(OrderModel::class, 'order_id');
    }
}

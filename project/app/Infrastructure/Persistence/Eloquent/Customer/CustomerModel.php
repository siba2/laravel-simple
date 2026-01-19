<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Eloquent\Customer;

use App\Application\Product\DTO\ProductFilter;
use Illuminate\Database\Eloquent\Model;

final class CustomerModel extends Model
{
    protected $table = 'customers';

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'name',
        'email',
        'active'
    ];

    public function scopeFilter($query, ProductFilter $filter)
    {
        if ($filter->search) {
            $query->where('id', 'like', "%{$filter->search}%")
                ->orWhere('customer_id', 'like', "%{$filter->search}%");
        }

        return $query;
    }
}

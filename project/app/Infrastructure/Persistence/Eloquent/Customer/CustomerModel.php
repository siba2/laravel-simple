<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Eloquent\Customer;

use App\Application\Customer\DTO\CustomerFilter;
use App\Domain\Customer\Entity\Customer;
use App\Domain\Customer\ValueObject\CustomerId;
use App\Domain\Shared\ValueObject\Email;
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
        'active',
        'deletedAt'
    ];

    public function scopeFilter($query, CustomerFilter $filter)
    {
        $query->where('deletedAt', null);

        if ($filter->search) {
            $query->where('id', 'like', "%{$filter->search}%")
                ->orWhere('customer_id', 'like', "%{$filter->search}%");
        }

        return $query;
    }

    public static function mapToEntity(CustomerModel $model): Customer
    {
        return Customer::from(
            id: CustomerId::fromString($model->id),
            name: $model->name,
            email: Email::fromString($model->email),
            active: (bool) $model->active
        );
    }
}

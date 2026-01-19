<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Eloquent\Customer;

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
}

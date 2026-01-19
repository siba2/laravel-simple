<?php

declare(strict_types=1);


namespace App\Application\Order\DTO;

use App\Domain\Order\ValueObject\OrderStatus;

final class OrderFilter
{
    public ?OrderStatus $status;
    public ?string $search;
    public int $perPage;
    public int $page;

    public function __construct(array $data = [])
    {
        $this->status = isset($data['status']) ? OrderStatus::from($data['status']) : null;
        $this->search = $data['search'] ?? null;
        $this->perPage = (int)($data['per_page'] ?? 15);
        $this->page = (int)($data['page'] ?? 1);
    }
}

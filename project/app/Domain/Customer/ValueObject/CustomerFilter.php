<?php

declare(strict_types=1);


namespace App\Domain\Customer\ValueObject;

final class CustomerFilter
{
    public ?string $search;
    public int $perPage;
    public int $page;

    public function __construct(array $data = [])
    {
        $this->search = $data['search'] ?? null;
        $this->perPage = (int)($data['per_page'] ?? 15);
        $this->page = (int)($data['page'] ?? 1);
    }
}

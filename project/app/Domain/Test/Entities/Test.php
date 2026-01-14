<?php

declare(strict_types=1);


namespace App\Domain\Test\Entities;


final class Test
{
    private function __construct(private string $name){

    }

    public function getName(): string
    {
        return $this->name;
    }

    public function create(string $name): self{
        return new self($name);
    }
}

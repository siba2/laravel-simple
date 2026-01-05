<?php

declare(strict_types=1);


namespace App\Application\Commands;

use App\Domain\Test\Services\TestService;

final readonly class TestCommandHandler
{
   public function __construct(
       private TestService $service
   )
   {
   }

   public function handle(TestCommand $command): string
   {
       return $this->service->test($command->name, $command->email);
   }
}

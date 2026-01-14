<?php

declare(strict_types=1);


namespace App\Application\Commands\Handlers;

use App\Application\Commands\CreateOrderCommand;
use App\Domain\Test\Services\TestService;

final readonly class CreateOrderCommandHandler
{
   public function __construct(
       private TestService $service
   )
   {
   }

   public function handle(CreateOrderCommand $command): int
   {
       $this->service->create($command->name);

       return 1;
   }
}

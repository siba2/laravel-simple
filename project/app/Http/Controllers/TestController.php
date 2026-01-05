<?php

namespace App\Http\Controllers;

use App\Application\Commands\TestCommand;
use App\Application\Commands\TestCommandHandler;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(Request $request)
    {
        $command = new TestCommand(
            name: 'Ap',
            email: 'asd@asd',
        );

       $a =  app(TestCommandHandler::class)->handle($command);

        dump($a . '341');

        return response()->json(['status' => 'ok']);
    }
}

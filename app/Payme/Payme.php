<?php

namespace App\Payme;


use App\Payme\Exceptions\PaymeException;
use App\Payme\Handlers\PaymeRequestHandler;
use App\Payme\Services\PaymeService;
use Illuminate\Http\Request;

class Payme
{
    /**
     * @throws PaymeException
     */
    public function handle(Request $request)
    {
        $handler = new PaymeRequestHandler($request);
        return (new PaymeService($handler->params))->{$handler->method}();
    }
}

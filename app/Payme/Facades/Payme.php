<?php

namespace App\Payme\Facades;

use Illuminate\Support\Facades\Facade;
use Illuminate\Http\Request;

/**
 * @method static \App\Payme\Payme handle(Request $request)
 * @see \App\Payme\Payme
 */
class Payme extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'payme';
    }
}

<?php

namespace App\Payme\Http\Middleware;

use App\Payme\Exceptions\PaymeException;
use App\Services\LogService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Closure;

class PaymeCheck
{
    protected LogService $logService;

    public function __construct(LogService $logService)
    {
        $this->logService = $logService;
    }
    public function handle(Request $request, Closure $next): Response
    {
        $logID = uniqid();
        $this->logService->request('payme', $logID, $request->getRequestUri(), $request->getContent());
        $authorization = $request->header('Authorization');
        if(!$authorization ||
            !preg_match('/^\s*Basic\s+(\S+)\s*$/i', $authorization, $matches) ||
            base64_decode($matches[1]) != config('payme.login') . ":" . config('payme.key'))
        {
            throw new PaymeException(PaymeException::AUTH_ERROR);
        }

        $ip = $request->ip();

        if(!in_array($ip, config('payme.allowed_ips')))
        {
            throw new PaymeException(PaymeException::AUTH_ERROR);
        }

        $response = $next($request);
        $this->logService->response('payme', $logID, $response->getStatusCode(), $response->getContent());
        return $response;
    }
}

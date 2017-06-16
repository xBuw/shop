<?php

namespace Shop\Middleware;

use xbuw\framework\Request\Request;
use xbuw\framework\Response\Response;
use xbuw\framework\Middleware\MiddlewareContract;

class indexFrom0Middleware implements MiddlewareContract
{

    public function handle(Request $request, \Closure $next): Response
    {
        $request->id += 13;
        $result = $next($request);
        $request->id -= 13;
        return $result;
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: xbuw
 * Date: 16.06.17
 * Time: 15:08
 */

namespace Shop\Middleware;

use xbuw\framework\Middleware\MiddlewareContract;
use xbuw\framework\Request\Request;
use xbuw\framework\Response\Response;
use xbuw\framework\Validation\Validator;

class CheckYearMiddleware implements MiddlewareContract
{

    /**Check year, cannot greater then 2017
     * @param Request $request
     * @param \Closure $next
     * @return Response
     * @throws \Exception
     */
    public function handle(Request $request, \Closure $next): Response
    {
        Validator::addValidationRule("max", "Shop\\ValidationRules\\MaxValidationRule");
        $tempo = new Validator($request, [year => ["numeric", "max:2017"]]);
        if ($tempo->validate()) {
            $response = $next($request);
        } else {
            throw new \Exception("Invalid year");
        }
        return $response;
    }
}
<?php

namespace Middleware\Filters;


abstract class AbstractMiddleware
{
    abstract public function __invoke($request, $response, $next);
}
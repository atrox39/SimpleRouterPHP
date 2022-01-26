<?php

namespace Routing;

class Route
{
    public $route;
    public $method;
    public $callback;

    public function __construct($route, $method, $callback)
    {
        $this->route = $route;
        $this->method = $method;
        $this->callback = $callback;
    }
}
<?php

namespace Routing;

class Router
{
    private static $routes = array();

    public static function add($route)
    {
        array_push(self::$routes, $route);
    }

    public static function run()
    {
        foreach(self::$routes as $route)
        {
            if($route->route == $_SERVER['REQUEST_URI'] && $route->method == $_SERVER['REQUEST_METHOD'])
            {
                call_user_func($route->callback);
                return;
            }
        }
    }
}
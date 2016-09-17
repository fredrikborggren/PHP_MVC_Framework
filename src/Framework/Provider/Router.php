<?php

/**
 * Router Provider
 * 
 * @author     Fredrik Borggren
 * @copyright  Fredrik Borggren
 * @package    Framework\Provider\Router
 */

namespace Framework\Provider;

class Router {

    /**
     * @var array
     */

    private static $routes = array(
        'GET' => array(),
        'POST' => array()
    );

    /**
     * Prepare route of request method GET
     * @param string
     * @param callable
     * @return void
     */

    public static function get(string $route, callable $callable)
    {
        Router::map('GET', $route, $callable);
    }

    /**
     * Prepare route of request method POST
     * @param string
     * @param callable
     * @return void
     */

    public static function post(string $route, callable $callable)
    {
        Router::map('POST', $route, $callable);
    }

    /**
     * Prepare route of request method GET and POST
     * @param string
     * @param callable
     * @return void
     */

    public static function any(string $route, callable $callable)
    {
        Router::map(array('GET', 'POST'), $route, $callable);
    }

    /**
     * Register route
     * @param string
     * @param callable
     * @return void
     */

    private function map($method, string $route, callable $callable)
    {
        if (is_array($method))
        {
            foreach ($method as $type)
            {
                if (array_key_exists($type, Router::$routes))
                {
                    Router::$routes[$type][Router::parse($route)] = $callable;
                }
            }
        } else {
            Router::$routes[$method][Router::parse($route)] = $callable;
        }
    }

    /**
     * Parse route
     * @param string
     * @return array|boolean
     */

    private function parse(string $route)
    {
        $regex = array(
            '/:id/' => '(\d+)',
            '/:int/' => '(\d+)', 
            '/:str/' => '(\w+)', 
            '/:any/' => '(\w+)',
            '/:slug/' => '(\d*[a-zA-Z][a-zA-Z\d\s]*)'
        );
        $route = str_replace('/', '\/', trim($route, '/'));
        $pattern = array_keys($regex);
        $replacement = array_values($regex);
        return '/^' . preg_replace($pattern, $replacement, $route) . '\/?$/';
    }

    /**
     * Dispatch route
     * @return void
     */

    public function dispatch()
    {
        if (array_key_exists(Request::method(), Router::$routes))
        {
            foreach (Router::$routes[Request::method()] as $route => $callable)
            {
                if (preg_match($route, Request::uri(), $match))
                {
                    \call_user_func_array($callable, array_slice($match, 1));
                }
            }
        }
    }

}
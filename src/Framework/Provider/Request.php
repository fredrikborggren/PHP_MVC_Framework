<?php

/**
 * Request Provider
 * 
 * @author     Fredrik Borggren
 * @copyright  Fredrik Borggren
 * @package    Framework\Provider\Request
 */

namespace Framework\Provider;

class Request {

    /**
     * Get request URI
     * @return string
     */

    public function uri()
    {
        return trim($_SERVER['REQUEST_URI'], '/');
    }

    /**
     * Get request method
     * @return string
     */

    public function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * Get request GET data
     * @return string
     */

    public function get(string $propery)
    {
        return isset($_GET[$propery]) ? $_GET[$propery] : !1;
    }

    /**
     * Get request POST data
     * @return string
     */

    public function post(string $propery)
    {
        return isset($_POST[$propery]) ? $_POST[$propery] : !1;
    }

}
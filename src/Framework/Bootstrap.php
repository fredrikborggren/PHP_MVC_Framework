<?php

/**
 * Bootstrap
 * 
 * @author     Fredrik Borggren
 * @copyright  Fredrik Borggren
 * @package    Framework\Bootstrap
 */

namespace Framework;

use Framework\Provider\Router;
use Framework\Controller\Auth;

class Bootstrap {

    /**
     * Constructor
     * @return Framework\Bootstrap
     */

    public function __construct()
    {

       Router::any('/', function() {
            // do something
       });

        Router::get('/login', function() {
            // do something
        });

        Router::post('/login', function() {
            // do something
        });

        Router::any('/logout', function() {
            // do something
        });

        Router::get('/user/:id', function($id) {
            // do something
        });

    }

    /**
     * Destructor
     * @return void
     */
    
    public function __destruct()
    {
        Router::dispatch();
    }

}
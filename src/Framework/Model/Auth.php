<?php

/**
 * Auth Model
 * 
 * @author     Fredrik Borggren
 * @copyright  Fredrik Borggren
 * @package    Framework\Model\Auth
 */

namespace Framework\Model;

use Framework\Provider\Database;
use Framework\Provider\Request;

class Auth extends Database {

    /**
     * @var string|null
     */

    public $email;

    /**
     * @var string|null
     */

    public $password;

    /**
     * Process auth data query
     * @return boolean
     */

    public function login()
    {
        // do something
    }

    /**
     * Verify password
     * @return boolean
     */

    private function verify()
    {
        // do something
    }

    /**
     * Update last login timestamp
     * @return void
     */

    private function last_login()
    {
        // do something
    }

}
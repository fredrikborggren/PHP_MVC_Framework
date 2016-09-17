<?php

/**
 * Auth Controller
 * 
 * @author     Fredrik Borggren
 * @copyright  Fredrik Borggren
 * @package    Framework\Controller\Auth
 */

namespace Framework\Controller;

use Framework\Controller\Base;
use Framework\Model\Auth as Model;
use Framework\Provider\Request;
use Framework\Provider\Template;

class Auth extends Base {

    /**
     * @var Framework\Model\Auth
     */

    private $model;

    /**
     * @var Framework\Provider\Template
     */

    private $template;

    /**
     * @var string|null
     */

    public $email;

    /**
     * @var string|null
     */

    public $password;

    /**
     * Constructor
     * @return Framework\Controller\Auth
     */

    public function __construct()
    {
        $this->model = new Model;
        $this->template = new Template;
    }

    /**
     * Display auth form
     * @return void
     */

    public function form()
    {
        // do something
    }

    /**
     * Process auth form
     * @return void
     */

    public function login()
    {
        // do something
    }

    /**
     * Check auth status
     * @return boolean
     */

    public static function check()
    {
        // do something
    }

    /**
     * End auth session
     * @return void
     */

    public static function logout()
    {
        // do something
    }

}
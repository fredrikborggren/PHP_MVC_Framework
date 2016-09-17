<?php

/**
 * Template Provider
 * 
 * @author     Fredrik Borggren
 * @copyright  Fredrik Borggren
 * @package    Framework\Provider\Template
 */

namespace Framework\Provider;

class Template {

    /**
     * @var Twig_Loader_FileSystem
     */

    private $loader;

    /**
     * @var Twig_Environment
     */

    private $twig;

    /**
     * Constructor
     */

    public function __construct()
    {
        // do something
    }

    /**
     * Render template
     * @param string
     * @param array
     * @return void
     */

    public function render(string $file, array $data = array())
    {
        // do something
    }

}
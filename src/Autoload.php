<?php


spl_autoload_register(function ($class)
{
    // Framework 
    if (strncmp('Framework', $class, strlen('Framework')) === 0)
    {
        if (is_file($file = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php'))
        {
            if (file_exists($file))
            {
                require $file;
            }
        }
    }

});
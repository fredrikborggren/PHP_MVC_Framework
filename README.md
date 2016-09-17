# PHP_MVC_Framework
Just another MVC framework in PHP

## NGINX Config
Route all traffic to `index.php` 

```nginx
location / {
    try_files $uri /index.php;
}
```

## Routing
Add routes by request methods in constructor of `Framework/Bootstrap.php` .

```php
$this->router->get('/user/:id', function() {
    // load controller to view user
});

$this->router->post('/login', function() {
    // load controller to auth user
});
```

Pre-configured URI patterns

* `:id` for integers
* `:int` for integers
* `:str` for strings
* `:slug` for strings
* `:any` for any of above

## Controllers
Add controllers under `Framework/Controller` folder by namespace `Framework\Controller`.

```php
namespace Framework\Controller;

class User {

    public function view()
    {
        // do something
    }

    public function edit()
    {
        // do something
    }
    
}
```

## Models
Add models under `Framework/Model` folder by namespace `Framework\Model`.

```php
namespace Framework\Model;

class User {

    public function view()
    {
        // do something
    }

    public function edit()
    {
        // do something
    }
    
}
```

## Example

Controller

```php
namespace Framework\Controller;

use Framework\Model\User;

class User {
    
    private $model;

    public function __construct()
    {
        $this->model = new Model;
    }

    public function view($id)
    {
        $user = $this->model->find($id);

        // now use template engine (e.g. Twig) to display user profile with data
    }
    
}
```

Model

```php
namespace Framework\Model;

use Framework\Provider\Database;

class User extend Database {

    public function find($id)
    {
        return $this->query('select * from user where id = ?', $id);
    }
    
}
```

## Dependencies

PHP >= 5.4.0

## License

Copyright (c) Fredrik Borggren

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

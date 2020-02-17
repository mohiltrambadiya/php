<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

spl_autoload_register(function ($class) {
    $root = dirname(__DIR__);
    $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
    if(is_readable($file)) {
        require $root . '/' . str_replace('\\', '/', $class) . '.php';
    }
});

$router = new core\Router();

$router->add('', ['urlkey'=>'Home','controller' => 'Home', 'action' => 'homeIndexAction']);
$router->add('{controller}/{action}');
$router->add("{urlkey:\w+}",['controller' => 'Home', 'action' => 'homeIndexAction']);
$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);
$router->add('admin/{controller}/{id:\d+}/{action}', ['namespace' => 'Admin']);
$router->add("{controller}/{action}/{urlkey:\w+}");

$router->dispatch($_SERVER['QUERY_STRING']);
?>  
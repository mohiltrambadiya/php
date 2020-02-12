<?php

//require '../App/controller/Posts.php';
//require '../core/Router.php';


require_once dirname(__DIR__) . '/vendor/autoload.php';



spl_autoload_register(function ($class) {
    $root = dirname(__DIR__);
    $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
    if(is_readable($file)) {
        require $root . '/' . str_replace('\\', '/', $class) . '.php';
    }

});

$router = new core\Router();

$router->add('', ['controller' => 'home', 'action' => 'index']);
//$router->add('posts', ['controller' => 'home', 'action' => 'index']);
//$router->add('posts/new', ['controller' => 'new', 'action' => 'post']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);


/*
$url = $_SERVER['QUERY_STRING'];

if($router->match($url)) {
    echo '<pre>';
    var_dump($router->getParams());
    echo '</pre>';
}
else {
    echo "route not found";
}
*/
echo "<pre>";
echo htmlspecialchars(print_r($router->getRoutes(), true));
echo "</pre>";
// print_r($router->routes);

$router->dispatch($_SERVER['QUERY_STRING']);
?>  
<?php

require '../core/Router.php';
$router = new Router();

$router->add('', ['controller' => 'post', 'action' => 'index']);
//$router->add('post', ['controller' => 'home', 'action' => 'index']);
//$router->add('post/new', ['controller' => 'new', 'action' => 'post']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');

$url = $_SERVER['QUERY_STRING'];

if($router->match($url)) {
    echo '<pre>';
    var_dump($router->getParams());
    echo '</pre>';
}
else {
    echo "route not found";
}
echo "<pre>";
echo htmlspecialchars(print_r($router->getRoutes(), true));
echo "</pre>";
// print_r($router->routes);
?>
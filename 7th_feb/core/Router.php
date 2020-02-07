<?php

class Router 
{

    public $routes = [];
    protected $params = [];

    public function add($route, $params = []) {
        $route = preg_replace('/\//', '\\/', $route);
        $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route); 
        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);
        echo $route . "<br>";
 
        $route = '/^' . $route . '$/i';
        $this->routes[$route] = $params;
    } 

    public function match($url)  {

        /*foreach($this -> routes as $route => $params) {
            if($url == $route) {
                $this -> params = $params;
                return true;
            }
        }
        return false;*/

       // $regExpression = '/^(?<controller>[a-z-]+)\/(?<action>[a-z-]+)$/';
       foreach($this->routes as $route => $params ) {
            if(preg_match($route, $url, $matches)) {
                foreach($matches as $key => $value) {
                    if(is_string($key)) {
                        $params[$key] = $value;
                    }
                }
                $this->params = $params;
                return true;
            }   
        }
        return false;
    }

    public function getRoutes() {
        return $this->routes;
    }

    public function getParams() {
        return $this->params;
    }
}
?>
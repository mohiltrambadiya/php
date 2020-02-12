<?php

namespace core;

class Router 
{

    public $routes = [];
    public $params = [];

    public function add($route, $params = []) {
        $route = preg_replace('/\//', '\\/', $route);
        $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route); 
        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);
 
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
                echo "<pre>";
                print_r($params); 
                echo "</pre>";
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

    public function dispatch($url) {

        $url = $this->removeQueryStringVariable($url);

        if($this->match($url)) {
            $controller = $this->params['controller'];
            $controller =  $this->convertToStudlyCaps($controller);
            //$controller = "App\controller\\$controller";
            $controller = $this->getNamespace() . $controller;

            if(class_exists($controller)) {
                $controllerobj = new $controller($this->params);

                $action = $this->params['action'];
                $action = $this->convertToCamalCase($action);

                if(is_callable([$controllerobj, $action])) {
                    $controllerobj->$action();
                }
                else {
                    echo "method $action (in controller $controller) not found";
                }
            }
            else {
                echo "controller class $controller not found";
            }
        }
        else {
            echo 'no route matched';
        }
    }

    protected function convertToStudlyCaps($string) {
        return str_replace(" ", "", ucwords(str_replace('-',' ',$string)));
    }

    protected function convertToCamalCase($string) {
        return lcfirst($this->convertToStudlyCaps($string));
    }

    public function removeQueryStringVariable($url)  {
        if($url != null) {
            $parts = explode('&', $url, 2);
            if(strpos($parts[0], '=') === false) {
                $url = $parts[0];
            }
            else {
                $url = '';
            }
        }
        return $url;
    }

    protected function getNamespace() {
        $namespace = 'App\controller\\';
        if(array_key_exists('namespace', $this->params)) {
            $namespace .= $this->params['namespace'] . '\\';
        } 
        return $namespace;
    }
}
?>
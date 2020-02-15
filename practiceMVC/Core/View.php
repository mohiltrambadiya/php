<?php

namespace Core;

class View
{
    public static function render($view, $args = []) {
        extract($args);
        $file = "../App/View/$view";
        if(is_readable($file)) {
            require $file;
        }
        else {
            echo "$file is not found";
        }
    }

    public static function renderTemplate($template, $arg = []) {
        static $twig = null;
        extract($arg);
        if($twig === null) {
            $loader = new \Twig\Loader\FilesystemLoader('../App/View');
            $twig = new \Twig\Environment($loader);
        }
        echo $twig->render($template, $arg);
    }
}

?>
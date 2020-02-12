<?php

namespace App\controller;
use \core\view;

class Home extends \core\controller
{

    protected function before() {
        echo "(before)";
    }

    protected function after() {
        echo "(after)";
    }

    public function indexAction() {
        echo "hello from the index action in the home controller!!!";
        /*
        $userName = ['firstname'=>'rohit','lastname'=>'patel'];
        view::render('Home/index.php',$userName);*/

        $color = ['name' => 'mohil',  'color'  => ['black', 'yellow', 'green']];
        view::renderTemplate('Home/index.html',$color);
    }

}

?>  
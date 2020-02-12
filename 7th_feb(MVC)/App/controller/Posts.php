<?php

namespace App\controller;
use \core\view;
use App\model\Post;

class Posts extends \core\controller
{

    public function indexAction() {
        echo "hello from the index action in the post controller!!!";
        echo "query string perameter";
        echo '<pre>';
        echo htmlspecialchars(print_r($_GET, true));
        echo '</pre>';
        $post = Post::getAll();
        view::renderTemplate('Post/index.html', ['posts'=>$post]);
    }

    public function addNewAction() {
        echo "hello from the addNew action in the post controller!!!";
    }

    public function editAction() {
        echo "hello from the edit action in the post controller!!!";
        echo "Router perameter";
        echo '<pre>';
        echo htmlspecialchars(print_r($this->route_params, true));
        echo '</pre>';
    }

    protected function before() {
        echo "(before)";
    }

    protected function after() {
        echo "(after)";
    }

}

?>
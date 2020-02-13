<?php

namespace App\controller;
use \core\view;
use App\model\Post;

class Posts extends \core\controller
{

    public function indexAction() {
        echo "hello from the index action in the post controller!!!";
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

    public function editData() {
        $post = Post::fatchData($this->route_params['id']);
        view::renderTemplate('Post/addpost.html', ['edit'=>'edit','posts'=>$post]);
    }


    public function getPostData() {
        $preparedPostData = $this->preparePostData('post');
        $count = Post::insertPost('postdata', $preparedPostData);
        if($count = 1) {
            echo "data insert successfully";
        }
        view::renderTemplate('Post/addpost.html');
    }

    public function getUpdateData() {
        $preparedPostData = $this->preparePostData('post');
        $count = Post::UpdatePost($this->route_params['id'],'postdata', $preparedPostData);
        if($count = 1) {
            echo "data update successfully";
        }
        view::renderTemplate('Post/addpost.html');
    }

    public function preparePostData($section) {
        $preparedPostData = [];
        foreach($_POST[$section] as $fieldName => $fieldValue) {
            switch($fieldName) {
                case 'title':
                    $preparedPostData['title'] = $fieldValue;
                break;
                case 'content':
                    $preparedPostData['content'] = $fieldValue;
                break;
            }
        }
        return $preparedPostData;
    }

    public function deleteData() {
        $count = Post::deletePostData($this->route_params['id'], 'postdata');
        if($count = 1) {
            echo "data delete successfully";
        }
    }

    protected function before() {
        echo "(before)";
    }

    protected function after() {
        echo "(after)";
    }

}

?>
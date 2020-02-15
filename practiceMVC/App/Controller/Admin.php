<?php

namespace App\Controller;
use App\Model\Dataoperation;
use Core\View;

class Admin extends \Core\Controller
{
    public function login() {
        View::renderTemplate("Admin/Login.html");
    }

    public function dashboard() {
        View::renderTemplate('Base.html');
    }

    public function authentication() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if($username == 'mohil' && $password == '123')  {
            $this->dashboard();
        }
    }

    public function manageProduct() {
        $product = Dataoperation::getAllData('products'); 
        View::renderTemplate("Admin/Showproduct.html",['showproducts'=>$product]);   
    }

    public function manageCategory() {
        $category = Dataoperation::getAllData('categories'); 
        View::renderTemplate("Admin/Showcategory.html",['showcategories'=>$category]);   
    }
}

?>
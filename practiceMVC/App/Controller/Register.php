<?php

namespace App\Controller;
use App\Model\Dataoperation;
use Core\View;

class Register extends \Core\Controller
{
    public function showLogin() {
        View::renderTemplate("User/Login.html");
    }

    public function showRegister() {
        View::renderTemplate("User/Register.html");
    }

    public function addUser() {
        $preparedRegisterData = $this->prepareRegisterData('register');
        $lastis = Dataoperation::insertCategory('register', $preparedRegisterData);
        if($lastis != null) {
            View::renderTemplate("User/Register.html");
        }
    }

    public function prepareRegisterData($section) {
        $preparedRegisterData = [];
        foreach($_POST[$section] as $fieldKey => $fieldValue) {
            switch($fieldKey) {
                case 'username':
                    $preparedRegisterData['username'] = $fieldValue;
                break;
                case 'email':
                    $preparedRegisterData['email'] = $fieldValue;
                break;
                case 'regpassword':
                    $preparedRegisterData['regpassword'] = $fieldValue;
                break;
            }
        }
        return $preparedRegisterData;
    }

    public function userLogin() {
        $cartData = Dataoperation::getAllData('cart');
        $preparedLoginData = $this->prepareRegisterData('login');
        Dataoperation::Login($preparedLoginData);
        $cmsData = Dataoperation::getAllData('cms_page');
        View::renderTemplate("Footer/Home.html", ['alldata'=>$cmsData]);
    }

    public function userLogout() {
        session_destroy();
        View::renderTemplate("User/Login.html");
    }
}

?>
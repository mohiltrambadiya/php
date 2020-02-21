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

    public function showAddress()  {
        View::renderTemplate("User/Showaddress.html");
    }

    public function addUser() {
        $preparedRegisterData = $this->prepareRegisterData('register');
        $lastID = Dataoperation::insertData('user', $preparedRegisterData);
        $_SESSION['lastid'] = $lastID;
        if($lastID != 0) {
            View::renderTemplate("User/Showaddress.html");
        }
    }

    public function prepareRegisterData($section) {
        $preparedRegisterData = [];
        foreach($_POST[$section] as $fieldKey=>$fieldValue) {
            switch($fieldKey) {
                case 'firstname':
                    $preparedRegisterData['firstname'] = $fieldValue;
                break;
                case 'lastname':
                    $preparedRegisterData['lastname'] = $fieldValue;
                break;
                case 'email':
                    $preparedRegisterData['email'] = $fieldValue;
                break;
                case 'regpassword':
                    $preparedRegisterData['regpassword'] = $fieldValue;
                break;
                case 'phoneno':
                    $preparedRegisterData['phoneno'] = $fieldValue;
                break;
            }
        }
        return $preparedRegisterData;
    }

    public function prepareAddressData($section) {
        $preparedAddressData = [];
        $lastID = $_SESSION['lastid'];
        $preparedAddressData['userid'] = $lastID;
        foreach($_POST[$section] as $fieldKey=>$fieldValue) {
            switch($fieldKey) {
                case 'street':
                    $preparedAddressData['street'] = $fieldValue;
                break;
                case 'city':
                    $preparedAddressData['city'] = $fieldValue;
                break;
                case 'state':
                    $preparedAddressData['state'] = $fieldValue;
                break;
                case 'country':
                    $preparedAddressData['country'] = $fieldValue;
                break;
            }
        }
        return $preparedAddressData;
    }

    public function addUserAdd() {
        $preparedAddressData = $this->prepareAddressData('address');
        $lastID = Dataoperation::insertData('user_address', $preparedAddressData);
        if($lastID != 0) {
            View::renderTemplate("User/Login.html");
        } 
    }

    public function userLogin() {
        $preparedRegisterData = $this->prepareRegisterData('login');
        Dataoperation::Login($preparedRegisterData);
        View::renderTemplate("User/Showserviceform.html");
    }
}

?>
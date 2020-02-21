<?php

namespace App\Controller;
use App\Model\Dataoperation;
use Core\View;

 class Service extends \Core\Controller 
 {
    public function addService() {
        $preparedServiceData = $this->prepareServiceData('service');
        $timeSlot = Dataoperation::checkTimeSlot($preparedServiceData);
        $count = sizeof($timeSlot);
        if($count < 3) {
            $lastid = Dataoperation::insertData('service_registration', $preparedServiceData);
            if($lastid != 0) {
                $this->showService();
            }
        }
        else {
            echo 'today this time slot is full';
        }

    }

    public function prepareServiceData($section) {
        $preparedServiceData = [];
        $userid = $_SESSION['loginid'];
        echo $userid;
        $preparedServiceData['userid'] = $userid;
        foreach($_POST[$section] as $fieldKey => $fieldValue) {
            switch($fieldKey) {
                case 'title':
                    $preparedServiceData['title'] = $fieldValue;
                break;
                case 'vehicalnumber':
                    $preparedServiceData['vehicalnumber'] = $fieldValue;
                break;
                case 'licensenumber	':
                    $preparedServiceData['licensenumber	'] = $fieldValue;
                break;
                case 'date':
                    $preparedServiceData['servicedate'] = $fieldValue;
                break;
                case 'timeslot':
                    $preparedServiceData['timeslot'] = $fieldValue;
                break;
                case 'vehicalissue':
                    $preparedServiceData['vehicalissue'] = $fieldValue;
                break;
                case 'servicecenter':
                    $preparedServiceData['servicecenter'] = $fieldValue;
                break;
            }
            
        }
        return $preparedServiceData;
    }

    public function showService() {
        $serviceData = Dataoperation::getAllData('service_registration');
        View::renderTemplate("User/Shoeservicedata.html", ['showservicedata' => $serviceData]);
    }

    public function showServicegrid() {
        $serviceData = Dataoperation::getAllData('service_registration');
        View::renderTemplate("Admin/Showadmin.html" ,['showservicedata' => $serviceData]);
    }

    //public function editServiceData() {
      //  $id = $this->route_params['Serviceid'];
        //$product = Dataoperation::getAllData('products', "id = $id");
        //View::renderTemplate('Admin/Addproduct.html', ['edit'=>'edit','products'=>$product[0],'categories'=>$category]);
 

    //}
 }

?>
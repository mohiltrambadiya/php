<?php

namespace App\Controller\Admin;
use App\Model\Dataoperation;
use Core\View;

class Cms extends \Core\Controller
{
    public function addCmsData() {
        View::renderTemplate("Admin/AddCms.html");
    }

    public function insertCmsData() {
        if(isset($_POST['cms'])) {
            $preparedCmsData = $this->prepareCmsData('cms');
            $lastId = Dataoperation::insertCategory('cms_page', $preparedCmsData);
            if($lastId != 0) {
                echo "data insert succesfully";
            }
            View::renderTemplate("Admin/Addcms.html");
        }
    }

    public function prepareCmsData($section) {
        $preparedCmsData = [];
        foreach($_POST[$section] as $fieldName => $fieldValue) {
            switch($fieldName) {
                case 'pagetitle':
                    $preparedCmsData['pagetitle'] = $fieldValue;
                break;
                case 'urlkey':
                    $preparedCmsData['urlkey'] = $fieldValue;
                break;
                case 'status':
                    $preparedCmsData['status'] = $fieldValue;
                break;
                case 'content':
                    $preparedCmsData['content'] = $fieldValue;
                break;
            }
        }
        return $preparedCmsData;
    }

    public function editCmsData() {
        $id = $this->route_params['id'];
        $cms = Dataoperation::getAllData('cms_page', "id = $id");
        View::renderTemplate('Admin/Addcms.html', ['edit'=>'edit','cmspage'=>$cms[0]]);
    }

    public function updateCmsData() {
        $preparedCmsData = $this->prepareCmsData('cms');
        $count = Dataoperation::UpdateData($this->route_params['id'],'cms_page', $preparedCmsData, 'id');
        if($count = 1) {
            echo "data update successfully";
        }
        View::renderTemplate('Admin/Addcms.html');
    }

    public function deleteCmsData() {
        $id = $this->route_params['id'];
        $count = Dataoperation::deleteData($id, 'cms_page', 'id');
        if($count = 1) {
            echo "data delete successfully";
        }
    }
}

?>
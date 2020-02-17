<?php

namespace App\Controller;
use App\Model\Dataoperation;
use Core\View;

class Home extends \Core\Controller
{
    public function homeIndexAction() {
        $urlKey = $this->route_params['urlkey'];
        $cmsData = Dataoperation::getAllData('cms_page', "urlkey = '$urlKey'");
        if($urlKey == 'Home') {
            $category = Dataoperation::getAllData('categories');
            View::renderTemplate("Footer/$urlKey.html",['cmsdata'=>$cmsData[0],'categorydata'=>$category]);
        }
        else {
            View::renderTemplate("Footer/$urlKey.html",['cmsdata'=>$cmsData[0]]);
        }
    }
}

?>
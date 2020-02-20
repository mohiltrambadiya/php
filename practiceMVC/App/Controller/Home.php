<?php

namespace App\Controller;
use App\Model\Dataoperation;
use Core\View;

class Home extends \Core\Controller
{
    public function homeIndexAction() {
        $urlKey = $this->route_params['urlkey'];
        $pageData = Dataoperation::getAllData('cms_page', "urlkey='$urlKey'");
        $cmsData = Dataoperation::getAllData('cms_page');
        $category = Dataoperation::getAllData('categories');
        View::renderTemplate("Footer/$urlKey.html",['alldata'=>$cmsData,'cmsdata'=>$pageData[0],'categorydata'=>$category]);
    }
}

?>
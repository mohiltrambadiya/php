<?php

namespace App\Controller;
use App\Model\Dataoperation;
use Core\View;

class Home extends \Core\Controller
{
    public function homeIndexAction() {
        $urlKey = $this->route_params['urlkey'];
        $cmsData = Dataoperation::getAllData('cms_page', "urlkey = '$urlKey'");
        View::renderTemplate("Footer/$urlKey.html",['cmsdata'=>$cmsData[0]]);

        if($urlKey == 'Home') {
            $query = "SELECT
                        p.id,
                        p.categoryname as parentCatName,
                        GROUP_CONCAT(c.categoryname) childCatName
                    FROM
                        categories as p 
                    LEFT JOIN 
                        categories as c 
                    ON
                         p.id = c.parentcategoryid
                     WHERE p.parentcategoryid IS NULL   
                    GROUP BY p.categoryname";
            $category = Dataoperation::queryData($query);
            View::renderTemplate("Footer/$urlKey.html",['categorydata'=>$category]);
        }
    }
}

?>
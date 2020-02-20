<?php

namespace App\Controller;
use App\Model\Dataoperation;
use Core\View;

class Usercategory extends \Core\Controller
{
    public function view() {
        $urlkey = $this->route_params['urlkey'];
        $query = "SELECT
                    p.* 
                FROM products as p 
                INNER JOIN products_categories as pc 
                ON p.id = pc.productid 
                INNER JOIN categories as c 
                ON c.id = pc.categoryid 
                WHERE c.urlkey = '$urlkey'";
        $urlKey = $this->route_params['urlkey'];
        $productData = Dataoperation::queryData($query);
        $cmsData = Dataoperation::getAllData('cms_page');
        $category = Dataoperation::getAllData('categories');
        // $pageData = Dataoperation::getAllData('cms_page', "urlkey='$urlKey'");
        View::renderTemplate("User/Userdata.html",['selectProduct'=>$productData,
        'alldata'=>$cmsData,'categorydata'=>$category]);

    }


    public function viewProduct() {
        $urlkey = $this->route_params['urlkey'];
        $productDetail = Dataoperation::getAllData('products', "urlkey = '$urlkey'");
        $cmsData = Dataoperation::getAllData('cms_page');
        $category = Dataoperation::getAllData('categories');
        View::renderTemplate("User/Showproductdetail.html",['productdetails'=>$productDetail[0]
        ,'alldata'=>$cmsData,'categorydata'=>$category]);
    }
}

?>
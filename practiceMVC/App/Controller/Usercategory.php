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
        $productData = Dataoperation::queryData($query);
        View::renderTemplate("Footer/Home.html",['selectProduct'=>$productData]);

    }
}

?>
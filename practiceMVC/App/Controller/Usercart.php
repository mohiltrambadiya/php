<?php

namespace App\Controller;
use App\Model\Dataoperation;
use Core\View;
class Usercart extends \Core\Controller
{
    public function addToCart() {
        $cartData['productid'] = $_POST['id'];
        $cartData['quantity'] = $_POST['cartQuantity'];
        $cartData['userid'] = $_POST['userid'];
        $lastid = Dataoperation::insertCategory('cart', $cartData);
        if($lastid !=0) {
            echo json_encode('Added!');
        }
    }

    public function fatchCartData() {
        $userid = $_SESSION['id'];
        if(isset($userid)) {
            $query = "SELECT products.*, cart.quantity, cart.cartid FROM products 
                  INNER JOIN cart ON products.id = cart.productid
                  WHERE cart.userid=$userid";
            $cartData = Dataoperation::queryData($query);
            if(isset($this->route_params['urlkey'])) {
                $urlkey = $this->route_params['urlkey'];
                $productDetail = Dataoperation::getAllData('products', "urlkey = '$urlkey'");
                View::renderTemplate("User/Showcartdetail.html",['productdetails'=>$productDetail[0]]);
            }
            else {
                $cmsData = Dataoperation::getAllData('cms_page');
                $category = Dataoperation::getAllData('categories');
                View::renderTemplate("User/Showcartdetail.html",
                ['alldata'=>$cmsData, 'categorydata'=>$category, 'cart'=>$cartData]);

            }
        }
        else {
            View::renderTemplate("User/Login.html");
        }
    }

    public function deleteCartProduct() {
        $deleteID = $this->route_params['id'];
        Dataoperation::deleteData($deleteID, "cart", 'cartid');
    }

}

?>
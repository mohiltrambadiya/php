<?php

namespace App\Controller\Admin;
use App\Model\Dataoperation;
use Core\View;

class Product extends \Core\Controller
{

    public function addProductData() {
    $category = Dataoperation::getAllData('categories');
    View::renderTemplate("Admin/Addproduct.html", ['categories'=>$category]);
    }
    
    public function insertProductData() {
        $productCategory = [];
        $preparedProductData = $this->prepareProductData('product');
        $lastId = Dataoperation::insertCategory('products', $preparedProductData);
        if($lastId != 0) {
            echo "data insert succesfully";
        }
        $productCategory['productid'] = $lastId;
        $productCategory['categoryid'] = $_POST['product']['category'];
        Dataoperation::insertCategory('products_categories', $productCategory);
        View::renderTemplate("Admin/Addproduct.html");
    }

    public function prepareProductData($section) {
        $preparedProductData = [];
        foreach($_POST[$section] as $fieldName => $fieldValue) {
            switch($fieldName) {
                case 'productname':
                    $preparedProductData['productname'] = $fieldValue;
                break;
                case 'SKU':
                    $preparedProductData['SKU'] = $fieldValue;
                break;
                case 'urlkey':
                    $preparedProductData['urlkey'] = $fieldValue;
                break;
                case 'status':
                    $preparedProductData['status'] = $fieldValue;
                break;
                case 'shortdiscription':
                    $preparedProductData['shortdiscription'] = $fieldValue;
                break;
                case 'price':
                    $preparedProductData['price'] = $fieldValue;
                break;
                case 'discription':
                    $preparedProductData['discription'] = $fieldValue;
                break;
                case 'stock':
                    $preparedProductData['stock'] = $fieldValue;
                break;
            }
        }
        $preparedProductData['image'] = $this->validateFile('productImage');
        return $preparedProductData;
    }

    public function validateFile($fieldName) {
        $uploadDir = '../public/uploads/';
        $uploadFile = $uploadDir . basename($_FILES[$fieldName]['name']);
        $acceptTypes = ['image/png', 'image/jpg', 'image/jpeg'];
        if(in_array($_FILES[$fieldName]['type'], $acceptTypes)) {
            move_uploaded_file($_FILES[$fieldName]['tmp_name'], $uploadFile);
            return $uploadDir . $_FILES[$fieldName]['name'];
        }else
            echo "<script> alert('please enter valid image $uploadFile'); </script>"; 
    }

    public function editProductData() {
        $category = Dataoperation::getAllData('categories');
        $product = Dataoperation::fatchData($this->route_params['id'], 'products');
        View::renderTemplate('Admin/Addproduct.html', ['edit'=>'edit','products'=>$product,'categories'=>$category]);
    }

    public function updateProductData() {
        $productCategory = [];
        $preparedProductData = $this->prepareProductData('product');
        $count = Dataoperation::UpdateData($this->route_params['id'],'products', $preparedProductData, 'id');
        if($count = 1) {
            echo "data update successfully";
        }
        $productCategory['productid'] = $this->route_params['id'];
        $productCategory['categoryid'] = $_POST['product']['category'];
        $count = Dataoperation::UpdateData($this->route_params['id'],'products_categories', $productCategory, 'productid');
        View::renderTemplate("Admin/Addproduct.html");
    }

    public function deleteProductData() {
        $count = Dataoperation::deleteData($this->route_params['id'], 'products', 'id');
        if($count = 1) {
            echo "data delete successfully";
        }
    }
   
}


?>
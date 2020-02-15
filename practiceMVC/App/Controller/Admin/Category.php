<?php

namespace App\Controller\Admin;
use App\Model\Dataoperation;
use Core\View;

class Category extends \Core\Controller
{
    public function addCategoryData() {
        $parentCategory = Dataoperation::getAllData('categories', 'parentcategoryid IS NULL');
        View::renderTemplate("Admin/AddCategory.html", ['parentCategories'=>$parentCategory]);
    }

    public function insertCategoryData() {
        $preparedCategoryData = $this->prepareCategoryData('category');
        $lastId = Dataoperation::insertCategory('categories', $preparedCategoryData);
        if($lastId != 0) {
            echo "data insert succesfully";
        }
        View::renderTemplate("Admin/Addcategory.html");
    }

    public function prepareCategoryData($section) {
        $preparedCategoryData = [];
        print_r($_POST['category']);
        foreach($_POST[$section] as $fieldName => $fieldValue) {
            switch($fieldName) {
                case 'categoryname':
                    $preparedCategoryData['categoryname'] = $fieldValue;
                break;
                case 'urlkey':
                    $preparedCategoryData['urlkey'] = $fieldValue;
                break;
                case 'status':
                    $preparedCategoryData['status'] = $fieldValue;
                break;
                case 'discription':
                    $preparedCategoryData['discription'] = $fieldValue;
                break;
                case 'parentcategory':
                    $preparedCategoryData['parentcategoryid'] = $fieldValue;
                break;
            }
        }
        $preparedCategoryData['image'] = $this->validateFile('categoryImage');
        return $preparedCategoryData;
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

    public function editCategoryData() {
        $parentCategory = Dataoperation::getAllData('categories', 'parentcategoryid IS NULL');
        $category = Dataoperation::fatchData($this->route_params['id'], 'categories');
        View::renderTemplate('Admin/Addcategory.html', ['edit'=>'edit', 
        'parentCategories'=>$parentCategory, 'categories'=>$category]);
    }

    public function updateCategoryData() {
        $preparedCategoryData = $this->prepareCategoryData('category');
        $count = Dataoperation::UpdateData($this->route_params['id'],'categories', $preparedCategoryData, 'id');
        if($count = 1) {
            echo "data update successfully";
        }
        View::renderTemplate('Admin/Addcategory.html');
    }

    public function deleteCategoryData() {
        $result = Dataoperation::getAllData( 'products_categories', $this->route_params['id']);
        print_r($result);
        die();
        foreach($result as $key=>$value) {
            foreach($key as $fieldkey=>$fieldValue) {
                switch($fieldkey) {
                    case 'productid':
                        Dataoperation::deleteData($fieldValue,'products','id');
                    break;
                }
            }
        }
        $count = Dataoperation::deleteData($this->route_params['id'], 'categories', 'id');
        if($count = 1) {
            echo "data delete successfully";
        }
        View::renderTemplate('Admin/Showcategory.html');
    }
}

?>
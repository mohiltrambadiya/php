<?php
require_once 'validation.php';
require_once 'dataOperation.php';
function getUserData($section) {
    $preparedUserData = [];
    foreach($_POST[$section] as $fieldName => $fieldValue ) {
        switch($fieldName) {
            case 'prefix':
                $preparedUserData['prefix'] = $fieldValue;
            break;
            case 'firstname':
                $preparedUserData['firstname'] = $fieldValue;
            break;
            case 'lastname':
                $preparedUserData['lastname'] = $fieldValue;
            break;
            case 'email':
                $preparedUserData['email'] = $fieldValue;
            break;
            case 'mobile':
                $preparedUserData['mobile'] = $fieldValue;
            break;
            case 'password':
                $preparedUserData['regpassword'] = $fieldValue;
            break;
            case 'information':
                $preparedUserData['information'] = $fieldValue;
            break;
        }
    }
    return $preparedUserData;
}

function getCategoryData($section) {
    $preparedCategoryData = [];
    foreach($_POST[$section] as $fieldName => $fieldValue) {
        switch($fieldName) {
            case 'title':
                $preparedCategoryData['title'] = $fieldValue;
            break;
            case 'content':
                $preparedCategoryData['content'] = $fieldValue;
            break;
            case 'url':
                $preparedCategoryData['url'] = $fieldValue;
            break;
            case 'metatitle':
                $preparedCategoryData['metatitle'] = $fieldValue;
            break;
            case 'parentcategory':
                $preparedCategoryData['parentcategory'] = $fieldValue;
            break;
        }
    }
    return $preparedCategoryData;

}

if(isset($_POST['user']) && isset($_POST['submit'])) {
    $preparedUserData = getUserData('user');
    insertData('user', $preparedUserData);
}

if(isset($_POST['login']) && isset($_POST['btnlogin'])) {
    $preparedUserData = getUserData('login');
    login($preparedUserData);
}

if(isset($_POST['category']) && isset($_POST['addcategory'])) {
    $preparedCategoryData = getCategoryData('category');
    insertData('category', $preparedCategoryData);
    getParentCategory();
}

if(isset($_POST['update']) && isset($_POST['category'])) {
    $preparedCategoryData = getCategoryData('category');
    updateData('category',$preparedCategoryData);
}
?>
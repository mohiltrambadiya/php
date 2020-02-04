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
                $preparedCategoryData['parentid'] = $fieldValue;
            break;
        }
    }
    return $preparedCategoryData;
}

function getBlogData($section) {
    $prepareBlogData = [];
    print_r($prepareBlogData);
    $userid = $_SESSION['userid'];
    foreach($_POST[$section] as $fieldName => $fieldValue) {
        switch($fieldName) {
            case 'title':
                $prepareBlogData['title'] = $fieldValue;
            break;
            case 'content':  
                $prepareBlogData['content'] = $fieldValue;
            break;
            case 'url':
                $prepareBlogData['url'] = $fieldValue;
            break;
            case 'publish':
                $prepareBlogData['publishat'] = $fieldValue;
            break;
            case 'category':
                $prepareBlogData['category'] = $fieldValue;
            break;
        }
    }
    $prepareBlogData['userid'] = $userid;
    return $prepareBlogData;
}

if(isset($_POST['user']) && isset($_POST['submit'])) {
    $preparedUserData = getUserData('user');
    insertData('user', $preparedUserData);
}

if(isset($_POST['login']) && isset($_POST['btnlogin'])) {
    $preparedUserData = getUserData('login');
    echo 'In';
    login($preparedUserData);
}

if(isset($_POST['category']) && isset($_POST['addcategory'])) {
    $preparedCategoryData = getCategoryData('category');
    insertData('category', $preparedCategoryData);
}

if(isset($_POST['update']) && isset($_POST['category'])) {
    $preparedCategoryData = getCategoryData('category');
    updateData('category',$preparedCategoryData);
}

if(isset($_POST['blog']) && isset($_POST['addblog'])) {
    $prepareBlogData = getBlogData('blog');
    insertData('post', $prepareBlogData);
}

if(isset($_POST['user']) && isset($_POST['update'])) {
    $preparedUserData = getUserData('user');
    updateData('user', $preparedUserData);
}

if(isset($_POST['blog']) && isset($_POST['updateblog'])) {
    $prepareBlogData = getBlogData('blog');
    print_r($prepareBlogData);
    updateData('post', $prepareBlogData);
}
?>
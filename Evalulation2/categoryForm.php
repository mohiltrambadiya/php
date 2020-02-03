<?php
if(isset($_GET['updateid'])) {
    $_SESSION['updateid'] = $_GET['updateid'];
}
 session_start();
 if(!isset($_SESSION['email'])) {
     header('Location:loginForm.php');
 }
 if(isset($_GET['logout'])) {
     session_destroy();
     unset($_SESSION['email']);
     header('Location:loginForm.php');
 }
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php require_once 'prepareData.php'?>
    <?php require_once 'dataOperation.php'?>
    <div class='logout'>
        <a href="categoryForm.php?logout='1'">Logout</a>
    </div>
    <div class='view'>
        <a href="blogCategory.php">viewcategory</a>
    </div>
    <div class='patent'>
        <div class='category-info'>
            <form action="categoryForm.php" method='post'>
                <fieldset>
                    <h1>Add category</h1>
                    <div class="title">
                        <label>Title:</label>
                        <input type="text" name="category[title]"
                        value='<?php echo getData('category', 'title')?>'>
                    </div>
                    <div class="content">
                        <label>Content:</label>
                        <input type="text" name="category[content]"
                        value='<?php echo getData('category', 'content')?>'>
                    </div>
                    <div class="url">
                        <label>URL:</label>
                        <input type="text" name="category[url]"
                        value='<?php echo getData('category', 'url')?>'>
                    </div>
                    <div class="metatitle">
                        <label>Meta Title:</label>
                        <input type="text" name="category[metatitle]"
                        value='<?php echo getData('category', 'metatitle')?>'>
                    </div>
                    <div class='parentcategory'>
                        <?php $parentcategory = ["Cricket", "Mobile", "UPSC", "Life"];?>
                        <lable>Parent Category:</lable>
                        <select name="category[parentcategory]">
                        <?php foreach($parentcategory as $parentcategoryvalue) :?>
                        <option value="<?php echo $parentcategoryvalue; ?>"
                        <?php if(getData('category', 'parentcategory') == $parentcategoryvalue){echo 'selected';}?>
                        > <?php echo $parentcategoryvalue; ?> </option>
                        <?php endforeach;?>
                        </select>
                    </div>
                    <div class="image">
                        <label>Image:</label>
                        <input type="file" name="category[image]">
                    </div>
                    <input type="submit" value='addcategory' name='addcategory'>
                    <input type="submit" value='update' name='update'>
                </fieldset>
            </form>
        </div>
    </div>
</body>
<style>
    label {
        display: inline-block;
        width: 150px;
    }
</style>
</html>
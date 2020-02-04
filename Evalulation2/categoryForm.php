<?php
 session_start();
 if(!isset($_SESSION['userid'])) {
     header('Location:loginForm.php');
 }
 if(isset($_GET['logout'])) {
     session_destroy();
     unset($_SESSION['userid']);
     header('Location:loginForm.php');
 }
 if(isset($_GET['updateid'])) {
    $_SESSION['updateid'] = $_GET['updateid'];
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
    <div class='profile'>
        <a href="register.php?>">profile</a>
    </div>
    <div class='blog'>
        <a href="addblog.php">addblog</a>
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
                        <?php $result = getParentCategory()?>
                        <lable>Parent Category:</lable>
                        <select name="category[parentcategory]">
                        <?php while ($row = mysqli_fetch_assoc($result)):?>
                            <option value="<?php echo $row['parentid']?>">
                            <?php echo $row['parentcategory'];?>
                            </option>
                        <?php endwhile;?>
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
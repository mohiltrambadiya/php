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
if(isset($_GET['updateblogid'])) {
    $_SESSION['updateblogid'] = $_GET['updateblogid'];
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
    <div class='parent'>
        <div class='logout'>
            <a href="addblog.php?logout='1'">Logout</a>
        </div>
        <div class='addcategory'>
            <a href="categoryForm.php">addcategory</a>
        </div>
        <div>
            <a href="blogView.php">viewblog</a>
        </div>
        <div class='blog-info'>
            <form action="addblog.php" method='post'>
                <fieldset>
                <h1>Add blog</h1>
                    <div class="title">
                        <label>Title:</label>
                        <input type="text" name="blog[title]"
                        value="<?php echo getData('blog','title');?>">
                    </div>
                    <div class="content">
                        <label>Content:</label>
                        <input type="text" name="blog[content]"
                        value="<?php echo getData('blog','content');?>">
                    </div>
                    <div class="url">
                        <label>URL:</label>
                        <input type="text" name="blog[url]"
                        value="<?php echo getData('blog','url');?>">
                    </div>
                    <div class="publish">
                        <label>Publish At:</label>
                        <input type="date" name="blog[publish]"
                        value="<?php echo getData('blog','publish');?>">
                    </div>
                    <div class='category'>
                        <?php $result = getCategory()?>
                        <lable>Category:</lable>
                        <select name="blog[category]" multiple>
                        <?php while ($row = mysqli_fetch_assoc($result)):?>
                            <option value="<?php echo $row['title']?>">
                            <?php echo $row['title'];?>
                            </option>
                        <?php endwhile;?>
                        </select>
                    </div>
                    <div class="image">
                        <label>Image:</label>
                        <input type="file" name="blog[image]">
                    </div>
                    <input type="submit" value='addblog' name='addblog'>
                    <input type="submit" value='updateblog' name='updateblog'>
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
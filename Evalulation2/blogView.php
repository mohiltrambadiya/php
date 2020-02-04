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
    <?php $fatchedData = fatchBlog();?>
    <?php
        if(isset($_GET['deleteblogid'])) {
            deleteData('post', $_GET['deleteblogid'], 'postid');
        } 
    ?>
    <div class='parent'>
        <div class='logout'>
            <a href="blogView.php?logout='1'">Logout</a>
        </div>
        <div class='addbog'>
            <a href="addblog.php">addblog</a>
        </div>
        <div class='managecategory'>
            <a href="blogCategory.php">managecategory</a>
        </div>
        <div class='profile'>
            <a href='register.php'>profile</a>
        </div>
        <table border="1px">
        <tr>
            <?php foreach($fatchedData[0] as $header => $value):?>
                <th><?php echo $header;?></th>
            <?php endforeach;?>
                <th>Action</th>
                <th>Action</th>
        </tr>
        <?php foreach($fatchedData as $key):?>
            <tr>
            <?php foreach($key as $field => $value):?>
            <td><?php echo $value;?></td>
            <?php endforeach;?>
            <td><a href="addblog.php?updateblogid=<?php echo $key['postid'];?>">Edit</a></td>
            <td><a href="blogView.php?deleteblogid=<?php echo $key['postid'];?>">Delete</a></td>
            </tr>
            <?php endforeach;?>
    </table>
    </div>
</body>
</html>
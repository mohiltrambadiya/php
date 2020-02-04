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
    <?php $fatchedData = fatchCategory();?>
        <div class='logout'>
        <a href="blogCategory.php?logout='1'">Logout</a>
    </div>
    <div class='addcategory'>
        <a href="categoryForm.php">addcategory</a>
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
            <td><a href="categoryForm.php?updateid=<?php echo $key['categoryid'];?>">Edit</a></td>
            <td><a href="blogCategory.php?deleteid=<?php echo $key['categoryid'];?>">Delete</a></td>
            </tr>
        <?php endforeach;?>
    </table>
    <?php
        if(isset($_GET['deleteid'])) {
            deleteData('category', $_GET['deleteid'], 'categoryid');
        } 
    ?>
</body>
</html>
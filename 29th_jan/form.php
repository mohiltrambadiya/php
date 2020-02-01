<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Database practice</title>
</head>
<body>
<?php require_once "formdata.php"?>
    <form action="form.php" method="post">
        <div class="parent">
            <div class="firstname">
                <label>First name:</label>
                <input type="text" name="firstname">
            </div>

            <div class="lastname">
                <label>Last name:</label>
                <input type="text" name="lastname">
            </div>

            <div class="phoneno">
                <label>Phone no:</label>
                <input type="text" name="phoneno">
            </div>
            <div>
                <label>ID:</label>
                <input type="text" name="id">
            </div>
            
        </div>
        <input type="submit" id="submit" name="submit" value="submit">   
        <input type="submit" id="select" name="select" value="select">
        <input type="submit" id="update" name="update" value="update">


        
    </form>
</body>

</html>
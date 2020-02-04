<?php 
session_start();
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
    <?php //require_once 'dataOperation.php'?>
    <?php //require_once 'validation.php'?>
    <div class="parent"> 
        <div class='login-info'>
        <h1>Login</h1>
            <form  action="blogView.php" method='post'>
                <fieldset>
                    <div class='email'>
                        <label>Email</label>
                        <input type="text" name="login[email]">
                    </div>
                    <div class='password'>
                        <label>Password</label>
                        <input type="password" name="login[password]">
                    </div>
                    <input type="submit" value='login' name='btnlogin'>
                    <input type="button" value='register' id="btnregister" name='register'>   
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
<script type="text/javascript">
    document.getElementById("btnregister").onclick = function () {
        location.href = 'register.php';
    };
</script></html>
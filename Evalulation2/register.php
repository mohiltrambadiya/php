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
    <?php require_once 'dataOperation.php'?>
    <?php require_once 'validation.php'?>
    <div class='parent'>
        <div class='register-ingo'>
            <form action="loginForm.php" method="post">
                <fieldset>
                    <h1>Register</h1>
                    <div class="prefix-info">
                        <?php $prefix = ["Mr", "Miss", "Mrs", "Dr"];?>
                        <lable>prefix</lable>
                        <select name="user[prefix]">
                        <?php foreach($prefix as $prefixvalue) :?>
                        <option value="<?php echo $prefixvalue; ?>"
                        <?php if(getData('user','prefix') == $prefixvalue){echo "selected";}?>> 
                        <?php echo $prefixvalue; ?> </option>
                        <?php endforeach;?>
                        </select>
                    </div>
                    <div class="firstname">
                        <label>Frist Name:</label>
                        <input type="text" name="user[firstname]"
                        value="<?php echo getData('user', 'firstname')?>">
                    </div>
                    <div class="lastname">
                        <label>Last Name:</label>
                        <input type="text" name="user[lastname]"
                        value="<?php echo getData('user', 'lastname')?>">
                    </div>
                    <div class="email">
                        <label>Email:</label>
                        <input type="text" name="user[email]"
                        value="<?php echo getData('user', 'email')?>">
                    </div>
                    <div class="mobile">
                        <label>Mobile:</label>
                        <input type="text" name="user[mobile]"
                        value="<?php echo getData('user', 'mobile')?>">
                    </div>
                    <div class="password">
                        <label>Password:</label>
                        <input type="text" name="user[password]"
                        value="<?php echo getData('user', 'password')?>">
                    </div>
                    <div class="confirmpassword">
                        <label>Confirm Password:</label>
                        <input type="text" name="user[confirmpassword]">
                    </div>
                    <div class="information">
                        <label>Information:</label>
                        <input type="text" name="user[information]"
                        value="<?php echo getData('user', 'information')?>">
                    </div>
                    <input type="checkbox" name='terms' require>accept all terms and condition
                    <div class='submit'>
                    <input type="submit" value='submit' name='submit'>
                    <input type="submit" value='update' name='update'>
                    </div>
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
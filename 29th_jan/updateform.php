<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    if(isset($_GET['id'])) {
        $_SESSION['id'] = $_GET['id'];
    }
    ?>
    <?php require_once "dataoperation.php"?>
    <?php require_once "registrationform.php"?>
    <?php require_once "preparedata.php"?>
    <form action="updateform.php" method="post">
    <fieldset>
        <legend>Account informaton</legend>
        <div class="account-info">

            <div class="prefix-info">
                <?php $prefix = ["Mr", "Miss", "Mrs", "Dr"];?>
                <lable>prefix</lable>
                <select name="account[prefix]">
                    <?php foreach($prefix as $prefixvalue) :?>
                    <option value="<?php echo $prefixvalue; ?>"
                    <?php if(getfieldvalue("account", "prefix") == $prefixvalue){echo "selected";}?>
                    > <?php echo $prefixvalue; ?> </option>
                    <?php endforeach;?>
                </select>
            </div>

            <div class="firstname">
                <label>Frist Name:</label>
                <input type="text" name="account[firstname]" 
                value="<?php echo getfieldvalue("account", "firstname");?>">
            </div>

            <div class="lastname">
                <label>Last Name:</label>
                <input type="text" name="account[lastname]" 
                value="<?php echo getfieldvalue("account", "lastname");?>">
            </div>

            <div class="dob">
                <label>Date of birth:</label>
                <input type="date" name="account[dob]" 
                value="<?php echo getfieldvalue("account", "dob");?>">
            </div>

            <div class="phoneno">
                <label>Phone No:</label>
                <input type="text" name="account[phoneno]" 
                value="<?php echo getfieldvalue("account", "phoneno");?>">
            </div>

            <div class="email">
                <label>Email:</label>
                <input type="text" name="account[email]" 
                value="<?php echo getfieldvalue("account", "email");?>">
            </div>

            <div class="password">
                <label>Password:</label>
                <input type="password" name="account[password]" 
                value="<?php echo getfieldvalue("account", "password");?>">
            </div>

            <div class="confirmpassword">
                <label>Confirm Password :</label>
                <input type="password" name="account[confirmpassword]" 
                value="<?php echo getfieldvalue("account", "confirmpassword");?>">
            </div>

        </div>
    </fieldset><br>  
    <fieldset>
        <legend>Address informaton</legend>
        <div class="addr-info">
            <div class="addr1">
                 <label>Address line1 :</label>
                 <input type="text" name="address[addr1]" 
                 value="<?php echo getfieldvalue("address", "addr1");?>">
            </div>

            <div class="addr2">
                 <label>Address line2 :</label>
                 <input type="text" name="address[addr2]" 
                 value="<?php echo getfieldvalue("address", "addr2");?>">
            </div>

            <div class="company">
                 <label>Company :</label>
                 <input type="text" name="address[company]" 
                 value="<?php echo getfieldvalue("address", "company");?>">
            </div>
            
            <div class="city">
                 <label>City :</label>
                 <input type="text" name="address[city]" 
                 value="<?php echo getfieldvalue("address", "city");?>">
            </div>

            <div class="state">
                 <label>State :</label>
                 <input type="text" name="address[state]" 
                 value="<?php echo getfieldvalue("address", "state");?>">
            </div>

            <div class="counry">
                <label>Country :</label>
                <?php $country = ["india", "australia", "usa", "uk", "itly"]?>
                <select name="address[country]">
                    <?php foreach($country as $countryvalue) :?>
                    <option value="<?php echo $countryvalue; ?>"
                    <?php if(getfieldvalue("address", "country") == $countryvalue){echo "selected";}?>
                    > <?php echo $countryvalue; ?> </option>
                    <?php endforeach;?>
                </select>
            </div>

            <div class="postalcode">
                 <label>Postal code :</label>
                 <input type="text" name="address[postalcode]" 
                 value="<?php echo getfieldvalue("address", "postalcode");?>">
            </div>
        </div>
    </fieldset> 

    <fieldset>
        <legend>Other information </legend>

        <div class="othet-info">
            <div class="discribe">
                <label>Discribe your self :</label>
                <textarea name="other[discribe]" cols="30" rows="5">
                <?php echo implode(",",getOther("other", "discribe"));?>
                </textarea>
            </div>

            <div class="bussiness">
                <label>How long have you been in business? </label><br>
                <?php $radioarry = ["UNDER 1 YEAR", "1-2 YEARS", "2-5 YEARS", "5-10 YEARS", "OVER 10 YEARS"]?>
                <?php foreach($radioarry as $radiovalue):?>
                    <?php $radio = array_intersect(getOther("other", "bussiness"),[$radiovalue]) ? "checked":"";?>
                    <input type="radio" name="other[bussiness]" value="<?php echo $radiovalue;?>"
                    <?php echo $radio; ?>>
                    <?php echo $radiovalue;?><br>
                <?php endforeach;?>
            </div>

            <div class="client">
            <label>Number of unique clients you see each week? :</label><br>
                <?php $client = ["1-5", "6-10", "11-15", "15+"];?>
                <select name="other[client]">
                    <?php foreach($client as $clientvalue) :?>
                    <option value="<?php echo $clientvalue; ?>"
                    <?php echo $select = array_intersect(getOther("other", "client"),[$clientvalue]) ? "selected":"";?>
                    > <?php echo $clientvalue; ?> </option>
                    <?php endforeach;?>
                </select>
            </div>

            <div class="getintouch">
                <label>How do you like us to get in touch with you?</label><br>
                <?php $getintouch = ["Post", "Email", "SMS", "Phone"];?>
                <?php foreach($getintouch as $getintouchvalue):?>
                    <?php $checkvalue = array_intersect(getOther("other", "getintouch", []), [$getintouchvalue]) ? "checked" : ""?>
                    <input type="checkbox" name="other[getintouch][]" value="<?php echo $getintouchvalue;?>"
                    <?php echo $checkvalue;?>>
                    <?php echo $getintouchvalue;?>
                <?php endforeach;?>
            </div>

            <div class="hobbies">
            <label>Hobbies :</label>
                <?php $hobbies = ["cricket", "art", "Listening to Music", "Travelling", "Blogging "]?>
                <select name="other[hobbies][]" multiple>
                    <?php foreach($hobbies as $hobbiesvalue) :?>
                    <?php $checkhobbies = array_intersect(getOther("other", "hobbies"), [$hobbiesvalue]) ? "selected" : ""?>
                    <option value="<?php echo $hobbiesvalue; ?>"
                    <?php echo $checkhobbies;?>
                    > <?php echo $hobbiesvalue; ?> </option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>
    </fieldset>
    <input type="submit" name="update" value="update">
    
</body>
</html>
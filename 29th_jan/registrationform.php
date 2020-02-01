<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php require_once "dataoperation.php"?>
    <?php require_once "preparedata.php"?>
    <form action="registrationform.php" method="post">
    <fieldset>
        <legend>Account informaton</legend>
        <div class="account-info">

            <div class="prefix-info">
                <?php $prefix = ["Mr", "Miss", "Mrs", "Dr"];?>
                <lable>prefix</lable>
                <select name="account[prefix]">
                    <?php foreach($prefix as $prefixvalue) :?>
                    <option value="<?php echo $prefixvalue; ?>"
                    > <?php echo $prefixvalue; ?> </option>
                    <?php endforeach;?>
                </select>
            </div>

            <div class="firstname">
                <label>Frist Name:</label>
                <input type="text" name="account[firstname]">
            </div>

            <div class="lastname">
                <label>Last Name:</label>
                <input type="text" name="account[lastname]">
            </div>

            <div class="dob">
                <label>Date of birth:</label>
                <input type="date" name="account[dob]">
            </div>

            <div class="phoneno">
                <label>Phone No:</label>
                <input type="text" name="account[phoneno]">
            </div>

            <div class="email">
                <label>Email:</label>
                <input type="text" name="account[email]">
            </div>

            <div class="password">
                <label>Password:</label>
                <input type="password" name="account[password]">
            </div>

            <div class="confirmpassword">
                <label>Confirm Password :</label>
                <input type="password" name="account[confirmpassword]">
            </div>
        </div>
    </fieldset>

    <fieldset>
        <legend>Address informaton</legend>
        <div class="addr-info">
            <div class="addr1">
                 <label>Address line1 :</label>
                 <input type="text" name="address[addr1]">
            </div>

            <div class="addr2">
                 <label>Address line2 :</label>
                 <input type="text" name="address[addr2]">
            </div>

            <div class="company">
                 <label>Company :</label>
                 <input type="text" name="address[company]">
            </div>
            
            <div class="city">
                 <label>City :</label>
                 <input type="text" name="address[city]">
            </div>

            <div class="state">
                 <label>State :</label>
                 <input type="text" name="address[state]">
            </div>

            <div class="counry">
                <label>Country :</label>
                <?php $country = ["india", "australia", "usa", "uk", "itly"]?>
                <select name="address[country]">
                    <?php foreach($country as $countryvalue) :?>
                    <option value="<?php echo $countryvalue; ?>"
                    > <?php echo $countryvalue; ?> </option>
                    <?php endforeach;?>
                </select>
            </div>

            <div class="postalcode">
                 <label>Postal code :</label>
                 <input type="text" name="address[postalcode]">
            </div>

        </div>
    </fieldset>

    <fieldset id="set3">
        <legend>Other information </legend>

        <div class="othet-info">
            <div class="discribe">
                <label>Discribe your self :</label>
                <textarea name="other[discribe]" cols="30" rows="5"></textarea>
            </div>

            <div class="bussiness">
                <label>How long have you been in business? </label><br>
                <?php $radioarry = ["UNDER 1 YEAR", "1-2 YEARS", "2-5 YEARS", "5-10 YEARS", "OVER 10 YEARS"]?>
                <?php foreach($radioarry as $radiovalue):?>
                    <input type="radio" name="other[bussiness]" value="<?php echo $radiovalue;?>">
                    <?php echo $radiovalue;?> <br>
                <?php endforeach;?>
            </div>

            <div class="client">
            <label>Number of unique clients you see each week? :</label><br>
                <?php $client = ["1-5", "6-10", "11-15", "15+"];?>
                <select name="other[client]">
                    <?php foreach($client as $clientvalue) :?>
                    <option value="<?php echo $clientvalue; ?>"> <?php echo $clientvalue; ?> </option>
                    <?php endforeach;?>
                </select>
            </div>

            <div class="getintouch">
                <label>How do you like us to get in touch with you?</label><br>
                <?php $getintouch = ["Post", "Email", "SMS", "Phone"];?>
                <?php foreach($getintouch as $getintouchvalue):?>
                    <input type="checkbox" name="other[getintouch][]" value="<?php echo $getintouchvalue;?>">
                    <?php echo $getintouchvalue;?>
                <?php endforeach;?>
            </div>

            <div class="hobbies">
            <label>Hobbies :</label>
                <?php $hobbies = ["cricket", "art", "Listening to Music", "Travelling", "Blogging "]?>
                <select name="other[hobbies][]" multiple>
                    <?php foreach($hobbies as $hobbiesvalue) :?>
                    <option value="<?php echo $hobbiesvalue; ?>"> <?php echo $hobbiesvalue; ?> </option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>
    </fieldset>


    <input type="submit" value="submit" name="submit">
    <input type="submit" value="showdata" name="showdata">
    </form>

</body>
<body>
    <br><br>
    <?php if(isset($_GET['deleteid'])) {
        deleteData('tbl_account', $_GET['deleteid']);
    } 
    ?>
    <table border="1">
        <tr>    
        <?php foreach(array_keys($fatchedData[0]) as $header) : ?>
            <th><?php echo $header;?></th>
        <?php endforeach;?>
        <th>Action</th>
        <th>Action</th>
        </tr>
        <?php foreach($fatchedData as $key):?>
            <tr>
            <?php foreach($key as $field => $fieldvalue):?>
            <td><?php echo $fieldvalue;?></td>
            <?php endforeach;?>
            <td><a href="updateform.php?id=<?= $key['ID'] ?>">Edit</a></td>
            <td><a href="registrationform.php?deleteid=<?=$key['ID']?>">Delete</a></td>
            </tr>
        <?php endforeach;?>
    </table>
</body>
<style>
    label {
        display: inline-block;
        width: 250px;
    }
</style>

</html>
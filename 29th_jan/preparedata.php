<?php
function accountData($section) {
    $prepareAccountData = [];
    foreach($_POST[$section] as $fieldname => $fieldvalue) {
        switch($fieldname) {
            case 'prefix':
                $prepareAccountData['prefix'] = $fieldvalue;
            break;
            case 'firstname':
                $prepareAccountData['firstname'] = $fieldvalue;
            break;
            case 'lastname':
                $prepareAccountData['lastname'] = $fieldvalue;
            break;
            case 'dob':
                $prepareAccountData['dob'] = $fieldvalue;
            break;
            case 'phoneno':
                $prepareAccountData['phoneno'] = $fieldvalue;
            break;
            case 'email':
                $prepareAccountData['email'] = $fieldvalue;
            break;
            case 'password':
                $prepareAccountData['password'] = $fieldvalue;
            break;
        }
    }
    return $prepareAccountData;
}

function addressData($section, $lastid) {
    $prepareAddressData = [];
    $prepareAddressData['ID'] = $lastid;
    foreach($_POST[$section] as $fieldname => $fieldvalue) {
        switch($fieldname) {
            case 'addr1':
                $prepareAddressData['addr1'] = $fieldvalue;
            break;
            case 'addr2':
                $prepareAddressData['addr2'] = $fieldvalue;
            break;
            case 'company':
                $prepareAddressData['company'] = $fieldvalue;
            break;
            case 'city':
                $prepareAddressData['city'] = $fieldvalue;
            break;
            case 'state':
                $prepareAddressData['state'] = $fieldvalue;
            break;
            case 'country':
                $prepareAddressData['country'] = $fieldvalue;
            break;
            case 'postalcode':
                $prepareAddressData['postalcode'] = $fieldvalue;
            break;
        }
    }
    return $prepareAddressData;
}

function  otherData($section, $lastid) {
    $preparedOtherData  = [];
    foreach($_POST[$section] as $fieldname => $fieldvalue ) {
        switch($fieldname) {
            case 'discribe':
                $preparedOtherData['discribe'] = $fieldvalue;
            break;
            case 'bussiness':
                $preparedOtherData['bussiness'] = $fieldvalue;
            break;
            case 'client':
                $preparedOtherData['client'] = $fieldvalue;
            break;
            case 'getintouch':
                $preparedOtherData['getintouch'] = implode(",", $fieldvalue);
            break;
            case 'hobbies':
                $preparedOtherData['hobbies'] = implode(",", $fieldvalue);
            break;
        }
    }  
    if(isset($_POST['submit'])) {
        $temparray = [];
        foreach($preparedOtherData as $key => $value) {
            $temparray['fieldkey'] = $key;
            $temparray['fieldvalue'] = $value;
            $temparray['ID'] = $lastid;
            insertData('customer_additional_info', $temparray);
        }
    } 
    return $preparedOtherData;
}

if(isset($_POST["account"]) && isset($_POST["address"])
 && isset($_POST["other"]) && isset($_POST['submit'])) {

    $prepareAccountData = accountData('account'); 
    $lastid = insertData('tbl_account', $prepareAccountData);

    $prepareAddressData = addressData('address', $lastid);
    insertData('customer_address', $prepareAddressData);

    otherData('other', $lastid);
} 

if(isset($_POST['showdata'])) {
    $fatchedData = fatchData();
}

if(isset($_POST["update"]) && isset($_POST['account']) 
&& isset($_POST['address']) && isset($_POST['other'])) {

   $prepareAccountData = accountData('account');
   updateData('tbl_account', $prepareAccountData);

   $id = $_SESSION['id'];
   $prepareAddressData = addressData('address',$id);
   updateData('customer_address', $prepareAddressData);

   $preparedOtherData = otherData('other',$id);
   updateOther('customer_additional_info', $preparedOtherData);
}
?>
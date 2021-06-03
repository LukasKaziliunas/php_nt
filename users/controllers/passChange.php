<?php

include_once 'config.php';
include_once 'sql.php';
include_once 'users/models/user.php';

$errorMsg = "";

if(isset($_POST['change']))
{
    $pass = $_POST['password'];
    $newpass = $_POST['newpassword'];
    $newpassrep = $_POST['newpasswordRep'];
    
    if( $newpass != $newpassrep )
    {
        $errorMsg = "naujas slaptažodis ir pakartotas slaptažodis turi sutapti";
    }else if(!user::checkClient($_SESSION['email'], $pass)){
        $errorMsg = "jūsų ivestas esamas slaptažodis neteisingas";
    }else if(strlen($newpass) > 255 || strlen($newpass) < 4){
        $errorMsg = "slaptažodžio ilgis turi būti nuo 4 iki 255";
    }else{
        $_SESSION['newPass'] = password_hash(strval($newpass), PASSWORD_DEFAULT);
        header("Location: index.php?sub=users&func=passChangeCode");
        die();
    }
}

include 'users/templates/passChange_form.php'; 
?>
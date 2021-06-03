<?php

echo "prisijungimas darbuotojams";

session_start();

include '../../config.php';
include '../../sql.php';
include '../models/user.php';

$data = array();
$errorMsg = "";

if(!empty($_POST['submit']))
{

$data = $_POST;
$email = $_POST['email'];
$pass = $_POST['pass'];


    if(user::checkStaff($email, $pass))
    {
        $user = user::getStaffData($email);
        $_SESSION['id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['surname'] = $user['surname'];
        $_SESSION['phone'] = $user['phone_no'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['uid'] = $user['type'];

        header("Location:" . ROOT . "/index.php");
        exit();
    }
    else
    {
        $errorMsg = "El. paštas arba slaptažodis įvestas netaisingai";
    }

}


include '../templates/loginStaff_form.php';


?>
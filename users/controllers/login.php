<?php
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


    if(user::checkClient($email, $pass))
    {
        $user = user::getClientData($email);
        $_SESSION['id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['surname'] = $user['surname'];
        $_SESSION['personal_no'] = $user['personal_no'];
        $_SESSION['phone'] = $user['phone_no'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['uid'] = CLIENT;

        header("Location:" . ROOT . "/index.php");
        exit();
    }
    else
    {
        $errorMsg = "El. paštas arba slaptažodis įvestas netaisingai";
    }

}


include '../templates/login_form.php';

?>
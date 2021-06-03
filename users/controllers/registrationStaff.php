<?php
include_once 'sql.php';
include_once 'config.php';
include 'users/models/user.php';

$staffTypes = user::getStaffTypes();

$data = array();
$errorMsg = "";

if(!empty($_POST['submit']))
{
    //paspausta <registruotis> 

    $name = $_POST['name'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $telnr = $_POST['telnr'];
    $pass = $_POST['pass'];
    $type = $_POST['staffType'];

    $data = $_POST;

    if(empty($name) || empty($lname) || empty($email) || empty($telnr) || empty($pass) || empty($type))
    {
    $errorMsg = "visi laukai turi būti užpildyti";   
    }
    else if(!preg_match("/^[a-zA-Z]*$/", $name) || !preg_match("/^[a-zA-Z]*$/", $lname))
    {
    $errorMsg = "varde ir pavardeje turi buti tik didziosios ir mazosios raides";
    }
    else if(strlen ( $name ) > 60)
    {
    $errorMsg = "vardo ilgis negali buti ilgesnis nei 60 simboliu";  
    }
    else if(strlen ( $lname ) > 60)
    {
    $errorMsg = "pavardes ilgis negali buti ilgesnis nei 60 simboliu";   
    }
    else if(strlen ( $pass ) < 4)
    {
    $errorMsg = "slaptazodis per trumpas, turi buti nors 4 simboliu ilgio"; 
    }
    else if(strlen ( $pass ) > 255)
    {
    $errorMsg = "slaptazodis negali buti ilgesnis nei 255 simboliai"; 
    }
    else if(user::checkStaff($email, $pass))
    {
    $errorMsg = "toks el. paštas jau naudojamas";     
    }
    else
    {
    $passhash = password_hash(strval($pass), PASSWORD_DEFAULT);

    $query = "INSERT INTO staff (name, surname, phone_no, email, password, type)
              VALUES ( '$name', '$lname', '$telnr', '$email' , '$passhash' , '$type')";
    mysql::query($query);
    header("Location:" . ROOT . "/index.php");
    }

}

include  'users/templates/registration_form_staff.php';
?>
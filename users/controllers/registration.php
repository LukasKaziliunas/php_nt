<?php

include '../../sql.php';
include '../../config.php';
include '../models/user.php';

$data = array();
$errorMsg = "";

if(!empty($_POST['submit']))
{
    //paspausta <registruotis> 

    $name = $_POST['name'];
    $lname = $_POST['lname'];
    $code = $_POST['code'];
    $email = $_POST['email'];
    $telnr = $_POST['telnr'];
    $pass = $_POST['pass'];
    $pass2 = $_POST['pass2'];

    $data = $_POST;

    if(empty($name) || empty($lname) || empty($code) || empty($email) || empty($telnr) || empty($pass) || empty($pass2))
    {
    $errorMsg = "visi laukai turi būti užpildyti";   
    }
    else if($pass != $pass2)
    {
    $errorMsg = "slaptažodžiai turi sutapti";
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
    else if(strlen ( $code ) != 11)
    {
    $errorMsg = "asmens kodas turi buti 11 skaitmenu"; 
    }
    else if(user::checkClient($email, $pass))
    {
    $errorMsg = "toks el. paštas jau naudojamas";     
    }
    else
    {
    $passhash = password_hash(strval($pass), PASSWORD_DEFAULT);

    $query = "INSERT INTO client (name, surname, personal_no, phone_no, email, password)
              VALUES ( '$name', '$lname', '$code' , '$telnr', '$email' , '$passhash')";
    mysql::query($query);

    $clientId_qry = "SELECT MAX(id) as id FROM client";
    
    $res = mysql::select($clientId_qry);
    $clientId = $res[0]['id'];
       
    $query2 = "INSERT INTO `rating` (`level`, `current_tendency`, `last_tendency`, `id`, `fk_CLIENT`) 
               VALUES ('0', '2', NULL, NULL, '$clientId')";
    mysql::query($query2);
    header("Location:" . ROOT . "/index.php");
    die();
    }

}


include '../templates/registration_form.php';

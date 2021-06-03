<?php
    include_once 'config.php';
    include_once 'sql.php';
    include_once 'users/models/user.php';

    $data = user::getClientData($_SESSION['email']);

    if(!empty($_POST['submit']))
    {
        //paspausta <issaugoti> 
    
        $name = $_POST['name'];
        $lname = $_POST['surname'];
        $code = $_POST['personal_no'];
        $email = $_POST['email'];
        $telnr = $_POST['phone_no'];

    
        $data = $_POST;
    
        if(empty($name) || empty($lname) || empty($code) || empty($email) || empty($telnr))
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
        else if(strlen ( $code ) != 11)
        {
        $errorMsg = "asmens kodas turi buti 11 skaitmenu"; 
        }
        else
        {

        user::clientUpdate($data);
        header("Location:" . ROOT . "/index.php?success=paskyra paredaguota sėkmingai");
        die();
        }
    
    }

    include 'users/templates/account_edit.tpl.php';

?>
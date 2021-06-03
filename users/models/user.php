<?php

 class user
 {
    
    function checkClient($email, $pass){
        $query = "SELECT password FROM client WHERE email = '$email' ";
        $result = mysql::select($query);

        if(sizeof($result) == 0)
        {
            return false;
        }
        else{
           $passHashed = $result[0]['password'];
           if(password_verify(strval($pass), $passHashed))
           {
              return true; 
           }
           else
           {
               return false;
           }
        }
    }

    function checkStaff($email, $pass){
        $query = "SELECT password FROM staff WHERE email = '$email' ";
        $result = mysql::select($query);

        if(sizeof($result) == 0)
        {
            return false;
        }
        else{
           $passHashed = $result[0]['password'];
           if(password_verify(strval($pass), $passHashed))
           {
              return true; 
           }
           else
           {
               return false;
           }
        }
    }

    function getClientData($email){
        $query = "SELECT id, name, surname, personal_no, phone_no, email FROM client WHERE email = '$email' ";
        $result = mysql::select($query);
        return $result[0];
    }

    function getStaffData($email){
        $query = "SELECT id, name, surname, phone_no, email, type FROM staff WHERE email = '$email' ";
        $result = mysql::select($query);
        return $result[0];
    }

    function getStaffTypes(){
        $query = "SELECT * FROM staff_types";
        $result = mysql::select($query);
        return $result;
    }

    function clientUpdate($clientData){
    $query = "UPDATE client SET 
    name = '{$clientData['name']}',
    surname = '{$clientData['surname']}',
    personal_no = '{$clientData['personal_no']}',
    phone_no = '{$clientData['phone_no']}',
    email = '{$clientData['email']}'
    WHERE id = '{$_SESSION['id']}'
    ";

    mysql::query($query);

    }   


 }
  
?>
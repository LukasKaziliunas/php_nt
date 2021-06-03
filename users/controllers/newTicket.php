<?php

include_once 'config.php';
include_once 'sql.php';
include 'users/models/ticket.php';

$errorMsg = "";

if(isset($_POST['submit']))
{
   if(strlen($_POST['title']) > 60)
   {
      $errorMsg = "antraštė per ilga";
   }else if(strlen($_POST['description']) > 60){
      $errorMsg = "Klausimas per ilgas";
   }else if( empty($_POST['title']) || empty($_POST['description']) ){
      $errorMsg = "visi laukai turi būti užpildyti";
   }else{
      Ticket::insert($_POST);
      header("Location:" . ROOT . "/index.php?success=anketa sukurta");
      exit;
   }
}


include 'users/templates/ticket_form.tpl.php';
   
?>
<?php
include_once 'config.php';
include_once 'sql.php';
include 'users/models/ticket.php';

$errorMsg = "";

if(isset($_POST['submit']))
{
    if(strlen($_POST['text']) > 60)
    {
        $errorMsg = "žinutė per ilga, max 60 simb";
    }else{
        if($_SESSION['uid'] == CLIENT)
        {
          Ticket::insertClientAnswer($_POST['text'], $id);  
        }else if($_SESSION['uid'] == ADMIN || $_SESSION['uid'] == MOD)
        {
          Ticket::insertStaffAnswer($_POST['text'], $id);  
        }
        
        header("Location: index.php?sub=users&func=ticketInfo&id=$id&success=atsakymas išsiūstas");
        exit;
    }
}

include 'users/templates/reply_form.tpl.php';

?>
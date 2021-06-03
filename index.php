<?php
session_start();
include 'config.php';
include 'sql.php';
if(!isset($_SESSION['uid'])){
  $_SESSION['uid']  = GUEST;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="utils/css/bootstrap.min.css" rel="stylesheet">
    <script src="utils/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles/style.css">

    <!-- <title>Document</title> -->
</head>
<body>
<div id="main-container">
    <?php 
    //pridedama antraste
    $path = DIR .'/includes/header.php';
    include  $path;

    //*********pranesimai *********/
    if(isset($_GET['error']))
    {
        $error = $_GET['error'];
        echo "<div class='alert alert-danger' role='alert'> $error </div>";
    }

    if(isset($_GET['success']))
    {
        $alert = $_GET['success'];
        echo "<div class='alert alert-success' role='alert'> $alert </div>";
    }
    //************************ */

    //atejus globalien kintamiesiems sub ir func (sub - subsystem , func - function) paimu ju reiksmes
    if(isset($_GET['sub']) && isset($_GET['func'])){
        $subsystem = $_GET['sub'];
        $function = $_GET['func'];

        if(isset($_GET['id']))
        {
            $id = $_GET['id']; //jei atejo id tai jis nustatomas kaip lokalus kintamasis ir kontroleris gali naudotis
        }

        // idedamas atitinkamas valdiklis
        $route = $subsystem . '/controllers/' . $function . '.php';
        include $route;
    }
    else{
        // default valdiklis objektu sarasas
        include 'objects/controllers/list.php';
    }
    ?> 

</div>
</body>
</html>
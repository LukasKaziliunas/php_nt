<?php

include_once 'config.php';
include_once 'sql.php';
include_once 'objects/models/estate.php';

$estateId = $_GET['id'];

estate::deleteEstate($id);

if($_SESSION['uid'] == CLIENT){
  header("Location:" .ROOT. "/index.php?sub=objects&func=sell&success=nt objektas istrintas");
  die();  
}else if($_SESSION['uid'] == ADMIN){
    header("Location:" .ROOT. "/index.php&success=nt objektas istrintas");
    die();   
}


?>
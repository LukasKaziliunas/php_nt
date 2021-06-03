<?php

   include_once 'config.php';
   include_once 'sql.php';
   include_once 'objects/models/estate.php';

   $where = "WHERE fk_SELLER = {$_SESSION['id']}";
   $data = array();
   $errorMsg = "";

   $data = estate::getEstateData($where);
 
   if(sizeof($data) == 0)
   $errorMsg = "sąrašas tuščias";

   include 'objects/templates/ad_list.tpl.php';
?>
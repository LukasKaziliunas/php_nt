<?php

   include_once 'config.php';
   include_once 'sql.php';
   include_once 'objects/models/estate.php';

   $selected = estate::getSelectedEstates($_SESSION['id']);
   $data = array();
   $errorMsg = "";

   foreach($selected as $estateId)
   {
      $result = estate::getEstateData("WHERE estate.id = $estateId");
      $data[] = $result[0];
   }
      if(sizeof($data) == 0)
      $errorMsg = "nerasta skelbimų";

      include 'objects/templates/ad_list.tpl.php';
?>
<?php

   include_once 'config.php';
   include_once 'sql.php';
   include_once 'objects/models/estate.php';
   include_once 'objects/models/filter.php';

   $errorMsg = "";
   $where = "";
   $data = array();

   if(isset($_GET['submit']))
   {

      $type = $_GET['type'];
      $areaFrom = $_GET['areaFrom'];
      $areaTo = $_GET['areaTo'];

      $roomCount = $_GET['roomCount'];
      $floorFrom = $_GET['floorFrom'];
      $floorTo = $_GET['floorTo'];

      $buildYear = $_GET['buildYear'];
      $priceFrom = $_GET['priceFrom'];
      $priceTo = $_GET['priceTo'];
 
      $category = $_GET['category'];
      $condition = $_GET['condition'];
      $heating = $_GET['heating'];


      if(!empty($type) || !empty($areaFrom) || !empty($areaTo) || !empty($roomCount) || !empty($floorFrom) || !empty($floorTo)
      || !empty($buildYear) || !empty($priceFrom) || !empty($priceTo) || !empty($category) || !empty($condition) || !empty($heating))
      {
         
         $where = filter::makeWhereQuery($type, $areaFrom, $areaTo, $roomCount, $floorFrom, $floorTo, 
         $buildYear, $priceFrom, $priceTo, $category, $condition, $heating );
         // echo $where;
      }
   
      
      $data = estate::getEstateData($where);
      if(sizeof($data) == 0)
      $errorMsg = "nerasta skelbimų";

      
      include 'objects/templates/ad_list.tpl.php';
   }
   else
   {
      include 'objects/templates/ad_filter.tpl.php';
   }

   
   
?>
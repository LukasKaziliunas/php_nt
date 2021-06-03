<?php

include_once 'config.php';
include_once 'sql.php';
include_once 'objects/models/estate.php';


$data = estate::getRawEstateDataById($id);

$editing = true;

//gaunu nt obj ipatybes
$query = "SELECT fk_CONVENIENCE as id FROM conveniences_of_estates WHERE fk_ESTATE = $id";
$res = mysql::select($query);

$conv = array();

//ipatybes is dvigubo masyvo sudedu i vienmati masyva
foreach($res as $row)
{
  $conv[] = $row['id'];
}


if (!empty($_POST['submit'])) {

  if (isset($_POST['conv'])) {
    $conv = $_POST['conv'];
  }

  $data = $_POST;

  if (empty($data['type'])) {
    $errorMsg = "tipas turi būti nurodytas";
  } else if (empty($data['description'])) {
    $errorMsg = "turi būti aprašymas";
  } else if (empty($data['category'])) {
    $errorMsg = "kategorija turi būti nurodyta";
  } else if (empty($data['city']) && empty($data['street'])) {
    $errorMsg = "miestas ir gatvė turi būti nurodyti";
  } else if (empty($data['condition_name'])) {
    $errorMsg = "būklė turi būti nurodyta";
  } else if (empty($data['heating'])) {
    $errorMsg = "šildymo tipas turi būti nurodytas";
  } else {

    estate::update($data, $id);
    estate::updateFeatures($conv, $id);

    header("Location:" . ROOT . "/index.php");
    die(); 
  }
    
  }
  include 'objects/templates/ad_form.tpl.php';


?>
<?php

include_once 'config.php';
include_once 'sql.php';
include_once 'uploader.php';
include_once 'objects/models/estate.php';
include_once 'objects/models/filter.php';

$errorMsg = "";
$data = array();
$conv = array();

if (!empty($_POST['submit'])) {

  if (isset($_POST['conv'])) {
    $conv = $_POST['conv'];
  }

  $data = $_POST;

  $uploader = new Uploader($_FILES['file']);

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
  } else if (!$uploader->move_file()) {
    $errorMsg = $uploader->GetErrorMsg();
  }else {

    $estateId = estate::insert($data, $_SESSION['id']);
    estate::insertFeatures($conv, $estateId);
    $pictureName = $uploader->getFileName();

    estate::insertEstateImage($estateId, $pictureName);
    header("Location:" . ROOT . "/index.php?success=nt objektas sukurtas");
    die();
  }
}
include 'objects/templates/ad_form.tpl.php';

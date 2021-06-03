<?php
include_once 'config.php';
include_once 'sql.php';
include_once 'objects/models/estate.php';
include_once 'visits/models/visit.php';

$errorMsg = "";
$dataE = array();
$dataB = array();
$dataS = array();

$estate = $_GET["estate"];
$seller_id = $_GET["seller_id"];

$dataE = visit::getEstate($estate);
$dataB = visit::getBuyer();
$dataS = visit::getSeller($seller_id);
if(isset($_POST['submit']))
{
    $data = array();
    $data = $_POST;

    if (empty($data['datetime'])) {
        $errorMsg = "Laikas privalo būti nurodytas!";
    }
    else {
        visit::insertNewVisit($data,$estate,$seller_id);
        header("Location:" . ROOT . "/index.php?sub=objects&func=getInfo&id=$estate&success=Vizitas sukurtas!");
        die();
    }
}
    
    
//   if (empty($data['type'])) {
//     $errorMsg = "tipas turi būti nurodytas";
//   } else if (empty($data['description'])) {
//     $errorMsg = "turi būti aprašymas";
//   } else if (empty($data['category'])) {
//     $errorMsg = "kategorija turi būti nurodyta";
//   } else if (empty($data['city']) && empty($data['street'])) {
//     $errorMsg = "miestas ir gatvė turi būti nurodyti";
//   } else if (empty($data['condition_name'])) {
//     $errorMsg = "būklė turi būti nurodyta";
//   } else if (empty($data['heating'])) {
//     $errorMsg = "šildymo tipas turi būti nurodytas";
//   } else if (!$uploader->validate()) {
//     $errorMsg = $uploader->GetErrorMsg();
//   }else {

//     $estateId = estate::insert($data, $_SESSION['id']);
//     estate::insertFeatures($conv, $estateId);
//     $pictureName = $uploader->move_file();

//     estate::insertEstateImage($estateId, $pictureName);
    

include 'visits/templates/visit_add_edit.php';

// if(!is_null($data)){
//     
// }

?>
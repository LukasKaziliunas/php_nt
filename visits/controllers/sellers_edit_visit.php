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
$buyer_id = $_GET["buyer_id"];
$visit_id = $_GET["visit_id"];

$dataE = visit::getEstate($estate);

//getBuyer, bet is tikro cia imamas bet kurio prisijungusio asmens id parametras per sesija...
$dataS = visit::getBuyer();

$dataB = visit::getBuyerAfterSelect($buyer_id);
$dataV = visit::getVisit($visit_id);

    $data = array();
    $data = $dataV;
    $old_time = $data[0]['datetime'];
    if(substr($data[0]['datetime'],11,1) >= "12"){

    }
    $old_time_temp = substr($data[0]['datetime'],5,2)."/".substr($data[0]['datetime'],8,2)."/".substr($data[0]['datetime'],0,4).
    " ".substr($data[0]['datetime'],11,2);
    var_dump($old_time_temp);
    var_dump($old_time);
    //die();
    $changed=false;
    if (empty($old_time)) {
        $errorMsg = "Laikas privalo būti nurodytas!";
    } else if(isset($_POST['datetime']) &&  $_POST['datetime'] == $old_time){
        $errorMsg = "Laikas privalo būti kitoks!";
    } else if(isset($_POST['datetime']) && $_POST['datetime'] != $old_time){
        $changed = true;
    }
    else if($changed == true) {
        visit::updateToChanged($_POST[0]['datetime'], $visit_id);
        header("Location:" . ROOT . "/index.php?sub=visits&func=visits_hosted&success=Vizito laikas pakeistas!");
        die();
    }

include 'visits/templates/visit_add_edit.php';

?>
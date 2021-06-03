<?php
include_once 'config.php';
include_once 'sql.php';
include_once 'contracts/models/contract.php';
include_once 'contracts/models/filter.php';

$errorMsg = "";
$data = array();


if(isset($_POST['btn_Info']))
{

    $data = contract::selectContract($_POST['btn_Info']);

    if(isset($_POST['btn_Info']))
    {
        include 'contracts/templates/ad_info.tpl.php';
    }

    

} else {

    echo '<a> ELSE Submit reached </a>';
    var_dump($infoId);
        include 'contracts/templates/ad_info.tpl.php';
}

?>
<?php
include_once 'config.php';
include_once 'sql.php';
include_once 'contracts/models/contract.php';
include_once 'contracts/models/filter.php';

$errorMsg = "";
$data = array();

var_dump($_GET);
var_dump($_POST);

if(isset($_POST['btn_SubmitEdit']))
{
    var_dump($_POST);
    //$data = contract::selectContract($_POST['btn_Info']);
    echo '<a> POST SubmitEDIT reached </a>';

    echo '<a> POST editDetails </a>';
    //var_dump($editDetails);
    //contract::updateDetails($_POST['editInput']);

    if(isset($_POST['btn_Info']))
    {
        include 'contracts/templates/ad_edit.tpl.php';
    }

    

} else {

    echo '<a> ELSE Submit reached </a>';
   // var_dump($infoId);
        //include 'contracts/templates/ad_info.tpl.php';
}

?>
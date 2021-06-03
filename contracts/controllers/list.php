<?php
//include 'contracts/templates/contract_list.php';
include_once 'config.php';
include_once 'sql.php';
include_once 'contracts/models/contract.php';
include_once 'contracts/models/filter.php';

$errorMsg = "";
$data = array();


// var_dump($_SESSION);
// var_dump($_POST);

if (isset($_SESSION['btn_Info'])) {
    include 'contracts/templates/ad_info.tpl.php';
}

if(isset($_POST['btn_Info']))
{

    $data = contract::getContracts($_SESSION['id'], $_SESSION['uid'], "");
    //echo '<a> Submit reached </a><br>';
    //var_dump($_SESSION);
    //echo '<a>  var_dump($_POST): </a><br>';
    //var_dump($_POST);
    //echo '<a>  ---- </a><br>';


    if( sizeof($data) == 0 ){
        $errorMsg = "nerasta sutarčių";
    }

    if(isset($_POST['btn_Info']))
    {
        //include 'contracts/templates/ad_info.tpl.php';
        include 'contracts/controllers/info.php';
    }
    else {
        include 'contracts/templates/ad_list.tpl.php';
    }

    

} 
else if (isset($_POST['btn_Delete']))
{
    var_dump($_POST);
    $result = contract::deleteContract($_POST['btn_Delete']);

    $data = contract::getContracts($_SESSION['id'], $_SESSION['uid'], "");
    echo '<h2><b> ESTATE DELETED </h2> ' . $result . ' </b><br>';
    include 'contracts/templates/ad_list.tpl.php';
}
else if (isset($_POST['btn_Edit']))
{

    //var_dump($_POST);
    $editDetails = contract::getEditDescription($_SESSION['id'], $_SESSION['uid'], $_POST['btn_Edit']);
    $_SESSION['btn_Edit'] = $_POST['btn_Edit'];

    //var_dump($editDetails);
    //$data = contract::getContracts($_SESSION['id'], $_SESSION['uid'], "");
    //echo '<h2><b> ESTATE EDITED </h2> ' . $result . ' </b><br>';
    //include 'contracts/controllers/edit.php';
    include 'contracts/templates/ad_edit.tpl.php';

}
else if (isset($_POST['btn_SubmitEdit']))
{

    if($_SESSION['uid'] == 1)
    {
        echo '<h2><b> LIST EDIT SUBMIT </h2> </b><br>';
        //var_dump($_POST);
        $editDetails = contract::getEditDescription($_SESSION['id'], $_SESSION['uid'], $_SESSION['btn_Edit']);

        contract::updateDetails($_SESSION['btn_Edit'], $_POST['editInput']);
        var_dump($editDetails);


        $data = contract::getContracts($_SESSION['id'], $_SESSION['uid'], "");
        include 'contracts/templates/ad_list.tpl.php';
    }
    else {
        echo '<h2><b> ITEM APPROVED </h2> </b><br>';
        contract::updateStatus($_SESSION['btn_Edit']);


        $data = contract::getContracts($_SESSION['id'], $_SESSION['uid'], "");
        include 'contracts/templates/ad_list.tpl.php';
    }
    //include 'contracts/templates/ad_edit.tpl.php';

}
else if (isset($_POST['btn_Export']))
{
        include 'contracts/controllers/export.php';
}
else {
    
// DEFINE('GUEST', '0');
// DEFINE('CLIENT', '1');
// DEFINE('BROKER', '2');
// DEFINE('NOTARY', '3');
// DEFINE('ADMIN', '10');


    $data = contract::getContracts($_SESSION['id'], $_SESSION['uid'], "");

    if( sizeof($data) == 0 )
        $errorMsg = "nerasta sutarčių";

        include 'contracts/templates/ad_list.tpl.php';
        //include 'contracts/templates/ad_filter.tpl.php';
}

?>
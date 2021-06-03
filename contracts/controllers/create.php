<?php
include_once 'config.php';
include_once 'sql.php';
include_once 'contracts/models/contract.php';
include_once 'contracts/models/filter.php';

$errorMsg = "";
$data = array();
$date = date('Y-m-d');


if(isset($_POST['btn_Submit']))
   {

    if(isset($id)){

    // var_dump($_SESSION);
    // var_dump($id);

    $temp_data = contract::SelectedEstate($id);

    contract::insertContract($_SESSION['id'],  $temp_data[0]['seller_id'], $id, $temp_data[0]['price'], $temp_data[0]['fee'], $temp_data[0]['fee_amount']);

    //var_dump($temp_data);
    $data = contract::getContracts($_SESSION['id'], $_SESSION['uid'], "");
    echo '<h2><b> ESTATE ADDED </h2> '  . $temp_data[0]['city']  . ", " . $temp_data[0]['estate_adress'] . ' </b><br>';

    echo "<a href='index.php?sub=contracts&func=list'>
            <div id='button-default' class='ad-info-buttons-box-button'>
                Grįžti
            </div>
          </a>";

    }
    else {
      echo "<h2><b> NO ESTATE SELECTED </h2></b><br>";
    }
    
   }
   else if(isset($id))
   {
    // echo '<a> ELSE reached </a><br>';
    // echo '<a> ID_ sent: '. $id. ' </a><br>';
    // echo "SESSION <br>";
    // var_dump($_SESSION);

    $data = contract::SelectedEstate($id);
    //var_dump($data);

    $buyer = contract::getSeller($_SESSION['id']);
    //var_dump($buyer);

    $seller = contract::getSeller($data[0]['seller_id']);
    //var_dump($seller);

    
    include 'contracts/templates/ad_form.tpl.php';
   }
   else {

    echo "<h2><b> NO ESTATE SELECTED </h2></b><br>";
   }

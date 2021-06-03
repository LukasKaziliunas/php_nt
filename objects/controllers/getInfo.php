<?php

include_once 'config.php';
include_once 'sql.php';
include_once 'objects/models/estate.php';
include_once 'visits/models/visit.php';

$where = "WHERE estate.id = $id";
$result = estate::getEstateData($where);

$result2 = visit::getSellerIDFromEstate($id);

$data = $result[0];
$seller = $result2[0]["fk_SELLER"];

$sellerId = $data['seller'];

$query_sellerContact = "SELECT CONCAT(name, ' ', surname, ' | tel.nr : ', personal_no, ' | email : ' , email) as sellerName FROM client WHERE id = $sellerId";

$seller = mysql::select($query_sellerContact);

$query_sellerRating = "SELECT * FROM rating WHERE fk_CLIENT = $sellerId"; 

$rating = mysql::select($query_sellerRating);


$image = estate::getEstateImage($id);
if(empty($image))
$image = "default-house.jpg";

$getFeatures = "SELECT name FROM conveniences_of_estates, convenience WHERE fk_ESTATE = $id AND convenience.id = fk_CONVENIENCE";
$features = mysql::select($getFeatures);


if (isset($_SESSION['id'])) {
    $selected = estate::getSelectedEstates($_SESSION['id']);

    if (in_array($id, $selected)) {
        $icon1 = '<i class="fas fa-heart" style="color: red"></i>';
        $isSelected = "1";
    } else {
        $icon1 = '<i class="fas fa-heart" style="color: grey"></i>';
        $isSelected = "0";
    }
}


if ($_SESSION['uid'] == GUEST) {
    $buttons = "";
} else if ($_SESSION['uid'] == CLIENT) {
    $buttons = "<div id='button-selected' class='offer-info-buttons-box-button' isSelected='$isSelected' estateId='$id'  clientId='{$_SESSION['id']}' onclick='selectionToggle()' > $icon1 įsiminti</div>";

    if($_SESSION['id'] == $data['seller'])
    {
        $buttons = $buttons . " <a href='index.php?sub=objects&func=edit&id=$id'>
                                    <div id='button-edit' class='offer-info-buttons-box-button'> <i class='fas fa-edit'></i> redaguoti</div>
                                </a>
                                <a href='#'>
                                    <div id='button-delete' class='offer-info-buttons-box-button' onclick=confirmDelete($id) > <i class='far fa-trash-alt'></i> ištrinti</div>
                                </a>";
    }
}else if($_SESSION['uid'] == ADMIN){
    $buttons = "<a href='index.php?sub=objects&func=edit&id=$id'>
                            <div id='button-edit' class='offer-info-buttons-box-button'> <i class='fas fa-edit'></i> redaguoti</div>
                            </a>
                            <a href='#'>
                            <div id='button-delete' class='offer-info-buttons-box-button' onclick=confirmDelete($id) > <i class='far fa-trash-alt'></i> ištrinti</div>
                            </a>";
}


include 'objects/templates/ad_info.tpl.php';

?>

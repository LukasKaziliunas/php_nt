<?php
include '../../config.php';
include '../../sql.php';

$isSelected = $_GET['isSelected'];
$estateId = $_GET['estateId'];
$clientId = $_GET['clientId'];

if($isSelected == "1")
{
    $query = "DELETE FROM `selected_estate` 
    WHERE `selected_estate`.`fk_CLIENT` = $clientId AND `selected_estate`.`fk_ESTATE` = $estateId";
}
else
{
    $query = "INSERT INTO `selected_estate` (fk_ESTATE, fk_CLIENT) VALUES ('$estateId' , '$clientId')";
}

$result = mysql::query($query);

?>
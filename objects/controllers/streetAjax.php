<?php
include '../../config.php';
include '../../sql.php';

$city = $_GET['city'];

$query = "SELECT * FROM street WHERE fk_CITY = $city";

$result = mysql::select($query);

echo "gatvė <select class='input-field' name='street'>";
echo "<option value=''>-</option>";

foreach($result as $street)
{
    echo "<option value='{$street['id']}'>{$street['name']}</option>";
}

echo "</select>";
?>
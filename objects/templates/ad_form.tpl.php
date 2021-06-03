<?php
$types = estate::getTable("estate_type");
$conveniences = estate::getTable("convenience");
$categorys = estate::getTable("category");
$heating = estate::getTable("heating");
$conditions = estate::getTable("conditions");
$citys = estate::getTable("city");

if(isset($data['city']))
{
    $query = "SELECT * FROM city WHERE id = {$data['city']}";
    $res = mysql::select($query);
    $selectedCity = $res[0];
}

if(isset($data['street']) && isset($selectedCity))
{
    $query1 = "SELECT * FROM street WHERE fk_CITY = {$selectedCity['id']} AND id = {$data['street']}";
    $res = mysql::select($query1);
    if(empty($res))
    {
        $selectedStreet = NULL;
    }else{
            $selectedStreet = $res[0];
    }


    $query2 = "SELECT * FROM street WHERE fk_CITY = {$selectedCity['id']}";
    $StreetsOfSelectedCity = mysql::select($query2);
}


?>

<style>
    .label {
        text-align: right;
        width: 110px;
    }

    .input-field {
        width: 150px;
    }

    .checkbox {
        margin-left: 110px;
    }
</style>

<head>

    <link rel="stylesheet" type="text/css" href="utils/dropzone/dist/min/dropzone.min.css">
    <script type="text/javascript" src="utils/dropzone/dist/min/dropzone.min.js"></script>

</head>
<?php
if(!empty($errorMsg))
echo "<div class='alert alert-danger' role='alert'> $errorMsg </div>"
?>
<form action="" method="POST" enctype="multipart/form-data">

    <label for="category" class="label">kategorija</label>
    <select name="category" class="input-field" id="category-selector">
        <option value=''>-</option>
        <?php 
        foreach ($categorys as $category) {
            $selected = "";
            if(isset($data['category']) && $data['category'] == $category['id'])
            {
                $selected = "selected";
            }
            echo "<option $selected value='{$category['id']}'>{$category['name']}</option>";
        }
        ?>
    </select><br>

    <label for="type" class="label">tipas</label>
    <select name="type" class="input-field">
        <option value=''>-</option>
        <?php
        foreach ($types as $type) {
            $selected = "";
            if(isset($data['type']) && $data['type'] == $type['id'])
            {
                $selected = "selected";
            }
            echo "<option $selected value='{$type['id']}'>{$type['name']}</option>";
        }
        ?>
    </select><br>

    <label for="area" class="label">plotas</label>
    <input type="number" name="area" <?php if (isset($data['area'])) {
                                            echo "value={$data['area']}";
                                        }  ?>><br>

    <div id="buildYear">
    <label for="buildYear" class="label">pastatymo metai</label>
    <input type="number" name="buildYear" <?php if (isset($data['buildYear'])) {
                                                echo "value={$data['buildYear']}";
                                            }  ?>><br>
    </div>

    <div id="roomCount">
    <label for="roomCount" class="label" >kambariu skaicius</label>
    <input type="number" name="roomCount"  <?php if (isset($data['roomCount'])) {
                                                echo "value={$data['roomCount']}";
                                            }  ?>><br>
    </div>

    <div id="floor">
    <label for="floor" class="label">aukstas</label>
    <input type="number" name="floor" id="floor" <?php if (isset($data['floor'])) {
                                            echo "value={$data['floor']}";
                                        }  ?>><br>
    </div>

    <label for="price" class="label">kaina</label>
    <input type="number" name="price" <?php if (isset($data['price'])) {
                                            echo "value={$data['price']}";
                                        }  ?>><br>

    <label for="description" class="label">aprasymas</label>
    <textarea rows="4" cols="50" name="description"><?php if (isset($data['description'])) {
                                                        echo $data['description'];
                                                    }  ?></textarea><br>

    <label for="city" class="label">miestas</label>
    <select id="citySelect" name="city" class="input-field" onChange="loadStreets()">
        <option value=''>-</option>
        <?php

        foreach ($citys as $city) {
            $selected = "";
            if(isset($selectedCity) && $city['id'] == $selectedCity['id'])
            {
                $selected = "selected"; 
            }

            echo "<option $selected value='{$city['id']}'>{$city['name']}</option>";
        }
        ?>
    </select><br>

    <div style="padding-left: 71px ; margin-bottom: 6px" id="steetField">
        gatvė <select <?php if (!isset($selectedStreet)){echo "disabled";}?> class="input-field" name="street">
            <?php 
            if(isset($selectedStreet))
            {
               foreach($StreetsOfSelectedCity as $street)
               {
                $selected = "";
                if($street['id'] == $selectedStreet['id'])
                {
                    $selected = "selected"; 
                }
                echo "<option $selected value='{$street['id']}'>{$street['name']}</option>";
               }
            }
            
            ?>
            <option value=''>-</option>
        </select><br>
    </div>

    <label for="condition_name" class="label">būklė</label>
    <select name="condition_name" class="input-field">
        <option value=''>-</option>
        <?php

        foreach ($conditions as $condition) {
            $selected = "";
            if(isset($data['condition_name']) && $data['condition_name'] == $condition['id'])
            {
                $selected = "selected";
            }
            echo "<option $selected value='{$condition['id']}'>{$condition['name']}</option>";
        }
        ?>
    </select><br>

    <label for="heating" class="label">šildymas</label>
    <select name="heating" class="input-field">
        <option value=''>-</option>
        <?php if (isset($data['heating'])) {
            echo "<option value='{$data['heating']}' selected>{$data['heating']}</option>";
        }
        foreach ($heating as $heatingType) {
            $selected = "";
            if(isset($data['heating']) && $data['heating'] == $heatingType['id'])
            {
                $selected = "selected";
            }
            echo "<option $selected value='{$heatingType['id']}'>{$heatingType['name']}</option>";
        }
        ?>
    </select><br>

    <label for="ownershipDocs" class="label">nuosavybes dokumentai</label>
    <input type="text" name=ownershipDocs <?php if (isset($data['ownershipDocs'])) {
                                                    echo "value={$data['ownershipDocs']}";
                                                }  ?> ><br>

    <label for="cadastralDocs" class="label" >kadastriniai dokumentai</label>
    <input type="text" name="cadastralDocs" <?php if (isset($data['cadastralDocs'])) {
                                                    echo "value={$data['cadastralDocs']}";
                                                }  ?> ><br>

    <label for="conv[]" class="label">ypatybės</label><br>
    <?php


    foreach ($conveniences as $convenience) {
        $checked = "";
        if(in_array($convenience['id'] , $conv))
        {
            $checked = "checked";
        }
        echo "<input $checked type='checkbox' name='conv[]' value='{$convenience['id']}' class='checkbox'>{$convenience['name']}<br>";
    }
    ?><br>

    <?php 
    if(!isset($editing))
    {
        echo "<label for='file' class='label'>nuotrauka</label>
        <input type='file' name='file'><br><br>";
    }
    ?>
    

    <input type="submit" name="submit" value="išsaugoti">

</form><br><br>

<script type="text/javascript">
    function loadStreets() {
        var hmlhttp = new XMLHttpRequest();
        hmlhttp.open("GET", "objects/controllers/streetAjax.php?city=" + document.getElementById("citySelect").value, false);
        hmlhttp.send(null);
        document.getElementById("steetField").innerHTML = hmlhttp.responseText;
    }
            //is pradziu hidden
            $('#roomCount').hide();
            $('#buildYear').hide();
            $('#floor').hide();

    $('#category-selector').on('change', function(){
        if(this.value == 1) //namas
        {
            $('#roomCount').hide();
            $('#buildYear').show();
            $('#floor').hide();
        }
        else if (this.value == 2) //butas
        {
            $('#roomCount').show();
            $('#buildYear').show();
            $('#floor').show();
        }
        else if(this.value == 3)//kita
        {
            $('#roomCount').hide();
            $('#buildYear').hide();
            $('#floor').hide();
        }else{                    // niekas
            $('#roomCount').hide();
            $('#buildYear').hide();
            $('#floor').hide();
        }

    });
</script>
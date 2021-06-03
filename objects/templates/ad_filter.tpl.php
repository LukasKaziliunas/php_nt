<?php
$types = estate::getTable("estate_type");
$conveniences = estate::getTable("convenience");
$categorys = estate::getTable("category");
$heating = estate::getTable("heating");
$conditions = estate::getTable("conditions");
?>

<style>
    #filters-container {
        display: grid;
        grid-template-columns: auto auto auto;
    }

    .input-field {
        width: 150px;
    }

    .input-field-half {
        width: 75px;
    }
</style>

<form action="" method="GET">

    <div id="filters-container">

        <div class="filters-box">

            <label for="category">kategorija</label><br>
            <select name="category" class="input-field">
                <option value=''>-</option>
                <?php
                foreach ($categorys as $category) {
                    echo "<option value='{$category['id']}'>{$category['name']}</option>";
                }
                ?>
            </select><br>


            <label for="areaFrom">plotas</label><br>
            <input type="number" name="areaFrom" class="input-field-half" placeholder="Nuo">
            <input type="number" name="areaTo" class="input-field-half" placeholder="Iki"><br>

            <label for="priceFrom">kaina</label><br>
            <input type="number" name="priceFrom" class="input-field-half" placeholder="Nuo">
            <input type="number" name="priceTo" class="input-field-half" placeholder="Iki"><br>

        </div>

        <div class="filters-box">
            
            <label for="roomCount">kambariu skaicius</label><br>
            <input type="range" name="roomCount" id="range_weight" value="0" min="0" max="10" oninput="range_weight_disp.value = range_weight.value">
            <output  id="range_weight_disp"></output><br>

            <label for="floorFrom">aukstas</label><br>
            <input type="number" name="floorFrom" class="input-field-half" placeholder="Nuo">
            <input type="number" name="floorTo" class="input-field-half" placeholder="Iki"><br>

            <label for="heating">šildymas</label><br>
            <select name="heating" class="input-field">
                <option value=''>-</option>
                <?php
                foreach ($heating as $heatingType) {
                    echo "<option value='{$heatingType['id']}'>{$heatingType['name']}</option>";
                }
                ?>
            </select><br>

        </div>

        <div class="filters-box">

            <label for="condition">būklė</label><br>
            <select name="condition" class="input-field">
                <option value=''>-</option>
                <?php
                foreach ($conditions as $condition) {
                    echo "<option value='{$condition['id']}'>{$condition['name']}</option>";
                }
                ?>
            </select><br>


            <label for="type">tipas</label><br>
            <select name="type" class="input-field">
                <option value=''>-</option>
                <?php
                foreach ($types as $type) {
                    echo "<option value='{$type['id']}'>{$type['name']}</option>";
                }
                ?>
            </select><br>


            <label for="buildYear">pastatymo metai</label><br>
            <input type="number" name="buildYear" class="input-field"><br>

            <br>

            <input type="submit" name="submit" value="ieskoti">
        </div>

    </div>

</form>
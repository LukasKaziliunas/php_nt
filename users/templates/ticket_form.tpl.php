<?php
if(!empty($errorMsg))
echo "<div class='alert alert-danger' role='alert'> $errorMsg </div>"
?>

<style>
    .label {
        text-align: right;
        width: 110px;
    }

    .input-field {
        width: 604px;
    }

</style>

<form action="" method="POST">

<label for="title" class="label">Antraštė</label>
    <input type="text" name="title" class="input-field"><br>

<label for="description" class="label">Klausimas</label>
    <textarea rows="4" cols="83" name="description"></textarea><br>

<input type="submit" name="submit" value="pateikti">
</form>
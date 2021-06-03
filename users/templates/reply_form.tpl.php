<?php
if(!empty($errorMsg))
echo "<div class='alert alert-danger' role='alert'> $errorMsg </div>"
?>
<form action="" method="POST">

<label for="text" class="label">žinutė</label>
    <textarea rows="4" cols="83" name="text"></textarea><br>

    <input type="submit" name="submit" value="pateikti">
</form>
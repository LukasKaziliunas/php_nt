<?php
if(!empty($errorMsg))
echo "<div class='alert alert-danger' role='alert'> $errorMsg </div>"
?>
<div style="margin: 100px auto ; width: 300px">
<form action="" method="POST">

<input type="text" name="code" placeholder="kodas">

<input type="submit" name="submitCode" value="pateikti">

</form>
</div>
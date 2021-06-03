<?php
if(!empty($errorMsg))
echo "<div class='alert alert-danger' role='alert'> $errorMsg </div>"
?>

<form action="index.php?sub=users&func=passChange" method="POST">

<div class="form-group">
            <label for="password" class="text-info">Jūsų esamas slaptažodis</label><br>
            <input type="password" name="password" class="form-control" >
        </div>
        <div class="form-group">
            <label for="newpassword" class="text-info">naujas slaptažodis</label><br>
            <input type="password" name="newpassword" class="form-control" >
        </div>

        <div class="form-group">
            <label for="newpasswordRep" class="text-info">pakartokite naują slaptažodį</label><br>
            <input type="password" name="newpasswordRep" class="form-control" >
        </div>


        <button Onclick="return ConfirmChange();" type="submit" name="change" value="1" disabled>vykdyti</button>

</form>


<script>
    function ConfirmChange()
    {
      var x = confirm("patvirtinti");
      if (x)
          return true;
      else
        return false;
    }
</script>   


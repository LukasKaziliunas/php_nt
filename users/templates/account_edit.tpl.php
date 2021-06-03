<?php
if(!empty($errorMsg))
echo "<div class='alert alert-danger' role='alert'> $errorMsg </div>"
?>

<form action="" method="POST">

<div class="form-group">
            <label for="name" class="text-info">Vardas</label><br>
            <input type="text" name="name" class="form-control" <?php if (isset($data['name'])) {
                                                                    echo "value={$data['name']}";
                                                                }  ?>>
        </div>
        <div class="form-group">
            <label for="lname" class="text-info">Pavardė</label><br>
            <input type="text" name="surname" class="form-control" <?php if (isset($data['surname'])) {
                                                                        echo "value={$data['surname']}";
                                                                    }  ?>>
        </div>

        <div class="form-group">
            <label for="code" class="text-info">Asmens kodas</label><br>
            <input type="text" name="personal_no" class="form-control" <?php if (isset($data['personal_no'])) {
                                                                        echo "value={$data['personal_no']}";
                                                                    }  ?>>
        </div>

        <div class="form-group">
            <label for="email" class="text-info">el. paštas:</label><br>
            <input type="email" name="email" class="form-control" <?php if (isset($data['email'])) {
                                                                        echo "value={$data['email']}";
                                                                    }  ?>>
        </div>

        <div class="form-group">
            <label for="telnr" class="text-info">Tel. Nr</label><br>
            <input type="text" name="phone_no" class="form-control" <?php if (isset($data['phone_no'])) {
                                                                        echo "value={$data['phone_no']}";
                                                                    }  ?>>
        </div>

        <input type="submit" name="submit" value="išsaugoti">
 
</form>
<body>
    <link href="../utils/css/bootstrap.min.css" rel="stylesheet">

    <form action="" method="post">

        <div class="form-group">
            <label for="name" class="text-info">Vardas</label><br>
            <input type="text" name="name" class="form-control" <?php if (isset($data['name'])) {
                                                                    echo "value={$data['name']}";
                                                                }  ?>>
        </div>
        <div class="form-group">
            <label for="lname" class="text-info">Pavardė</label><br>
            <input type="text" name="lname" class="form-control" <?php if (isset($data['lname'])) {
                                                                        echo "value={$data['lname']}";
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
            <input type="text" name="telnr" class="form-control" <?php if (isset($data['telnr'])) {
                                                                        echo "value={$data['telnr']}";
                                                                    }  ?>>
        </div>
        <div class="form-group">
            <label for="pass" class="text-info">Slaptažodis</label><br>
            <input type="password" name="pass" class="form-control" <?php if (isset($data['pass'])) {
                                                                        echo "value={$data['pass']}";
                                                                    }  ?>>
        </div>

        <div class="form-group">
            <label for="staffType" class="text-info">darbuotojo tipas</label><br>
                <select class="form-control" name="staffType" >
                    <?php if(isset($data['staffType'])){echo "<option value='{$data['staffType']}'>{$data['staffType']}</option>";} else { echo "<option value=''>-</option>}";}
                                
                                foreach($staffTypes as $stype)
                                {
                                   echo "<option value=\"" . "{$stype['id']}\"" . ">{$stype['name']}</option>"; 
                                }
                                
                    ?>
                </select>
        </div>

        <div class="form-row">
            <div class="form-group md-2">
                <input type="submit" name="submit" class="btn btn-info btn-md md-2" value="Registruotis">
            </div>
            <?php
            if (isset($errorMsg)) {
                echo  '<div class="form-group md-4">
                                         <p class="text-danger" style="padding-top: 5px ; padding-left: 10px">' . $errorMsg . '</p>
                                         </div>';
            }
            ?>
        </div>
    </form>

</body>
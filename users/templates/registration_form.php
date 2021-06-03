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
            <label for="code" class="text-info">Asmens kodas</label><br>
            <input type="text" name="code" class="form-control" <?php if (isset($data['code'])) {
                                                                        echo "value={$data['code']}";
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
            <label for="pass2" class="text-info">Pakartoti slaptažodį</label><br>
            <input type="password" name="pass2" class="form-control" <?php if (isset($data['pass2'])) {
                                                                            echo "value={$data['pass2']}";
                                                                        }  ?>>
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
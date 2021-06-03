<head>

    <link rel="stylesheet" type="text/css" href="utils/dropzone/dist/min/dropzone.min.css">
    <script type="text/javascript" src="utils/dropzone/dist/min/dropzone.min.js"></script>

</head>
<body>
<?php
if (!empty($errorMsg))
    echo "<div class='alert alert-danger' role='alert'> $errorMsg </div>"
?>

<label class="label">Objektas:</label>
    <p> <?php //if(isset($data['city']) && isset($data['street'])) {
        echo "Tipas: {$dataE[0]['category']}, adresas: {$dataE[0]['street']}, {$dataE[0]['city']}";
        ?></p>

<label class="label">Pirkėjas:</label>
    <p> <?php
        echo "{$dataB[0]['name']} {$dataB[0]['surname']}";
        ?></p>

<label class="label">Pardavėjas:</label>
    <p> <?php
        echo "{$dataS[0]['name']} {$dataS[0]['surname']}";
        ?></p>

<form action="" method="POST" enctype="multipart/form-data">

    <label for="datetime" class="label">Vizito laikas:</label></br>
    <input type="datetime-local" name="datetime"  <?php /*if (!empty($data[0]['datetime'])) {
                                                        echo "value={$data[0]['datetime']}";
                                                    }  ?>><?php echo "{$data[0]['datetime']}"*/ ?> </br>
    <p></p>
    <input type="submit" name="submit" value="išsaugoti">

</form><br><br>
</body>
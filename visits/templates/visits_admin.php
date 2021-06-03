<html>
<head>

    <link rel="stylesheet" type="text/css" href="utils/dropzone/dist/min/dropzone.min.css">
    <script type="text/javascript" src="utils/dropzone/dist/min/dropzone.min.js"></script>
    <title>Vizitai adminui</title>
</head>

<body>
    <?php
    if (!empty($errorMsg))
        echo "<div class='alert alert-danger' role='alert'> $errorMsg </div>"
    ?>
    Vizitų sąrašas
    <table>
        <tr>
            <th>Objektas</th>
            <th>Pirkėjas</th>
            <th>Pardavėjas</th>
            <th>Sutartas laikas</th>
            <th>Būsena</th>
            <th>Išvados</th>
            <th>Žinutės</th>
        </tr>
        <?php
        for($i = 0; $i < count($dataE); $i++){ ?>
            <tr>
            <td>
            <?php echo "<a href='index.php?sub=objects&func=getInfo&id=".$dataE[0][$i]["id"]."'>"
   ." Tipas: " . $dataE[0][$i]["category"] . ", adresas: " . $dataE[0][$i]["street"] .
     $dataE[0][$i]["city"]. "</a>"  ?>
            </td>
            <td><?php echo $dataB[0][$i]["name"] . " " . $dataB[0][$i]["surname"]; ?></td>
            <td><?php echo $dataS[0][$i]["name"] . " " . $dataS[0][$i]["surname"]; ?></td>
            <td><?php echo $visits[$i]["datetime"];?></td>
            <td><?php
            if($dataL[$i]["name"] = "registered"){
                echo "įrašytas";
            } else if ($dataL[$i]["name"] = "changed"){
                echo "derinamas";
            } else if ($dataL[$i]["name"] = "accepted"){
                echo "suderintas";
            } else if ($dataL[$i]["name"] = "concluded"){
                echo "baigtas";
            }else if ($dataL[$i]["name"] = "deleted"){
                echo "ištrintas";
            }
            ?>
            </td>
            <td>Kokios išvados?</td>
            <td>Zinutes</td>
            </tr>
        <?php } ?>
        <!-- <tr>
            <td>
                <?php
                // $i = 0;
                // foreach ($dataE as $estate) {
                //     echo "Tipas: " . $estate["category"] . ", adresas: " . $estate["street"] . " " . $estate["city"];
                //     $i++;
                // }
                ?>
            </td>
            <td>
                <?php
                // while ($i >= 0) {
                //     echo $dataB[0]["name"] . " " . $dataB[0]["surname"];
                //     $i--;
                // }
                ?>
            </td>
            <td>
                <?php
                // foreach ($dataS as $seller) {
                //     echo $seller["name"] . " " . $seller["surname"];
                // }
                ?>
            </td>
        </tr> -->
    </table>
</body>
</html>
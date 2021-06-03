
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>

    <!--Ctrl+Shift+/-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <style>
        .container {
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        .table-hover tbody tr:hover td,
        .table-hover tbody tr:hover th {
            background-color: #ddc17b;
        }
    </style>


    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="utils/css/bootstrap.min.css" rel="stylesheet">
    <script src="utils/js/bootstrap.bundle.min.js"></script>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <title>Sutarties informacija</title>
</head>

<body>

    <div class="container" style="background-color: #eceeef">
        <h3>Sutarties informacija</h3>
    </div>

    <div class="container">
        <div class="container-fluid bg-4">

        <!-- index.php?sub=contracts&func=contract_submit -->
       
            <form action="index.php?sub=contracts&func=list" method="post">

                <div class="container">
                    <div class="card">
                        <div class="card-header">
                            Sutartis
                            <?php    echo "<strong>" . $data[0]['register_date']  . "</strong>"    ?>
                            <span class="float-right"> <strong>Būsena:</strong>
                            <?php
                            if ($data[0]['date_signed'] != NULL) {
                                echo "Įvykdyta";
                            } else if ($data[0]['status_active'] == 1 && $data[0]['status_approved'] == 1) {
                                echo "Laukia apmokėjimo";
                            } else if ($data[0]['status_approved'] == 0) {
                                echo "Laukia patvirtinimo";
                            } else {
                                echo "Kuriama";
                            }
                            ?>
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-6">
                                    <h6 class="mb-3">Pardavėjas:</h6>
                                    <div>
                                        <?php echo "<strong>" . $data[0]['buyer'] . "</strong>"?>
                                    </div>
                                    <div>El. paštas:    <?php echo $data[0]['b_email']?></div>
                                    <div>Tel. numeris:  <?php echo $data[0]['b_phone'] ?></div>
                                </div>
                                <div class="col-sm-6">
                                    <h6 class="mb-3">Pirkėjas:</h6>
                                    <div>
                                        <?php echo "<strong>" . $data[0]['seller'] . "</strong>"?>
                                    </div>
                                    <div>El. paštas:    <?php echo $data[0]['s_email']?></div>
                                    <div>Tel. numeris:  <?php echo $data[0]['s_phone'] ?></div>
                                </div>
                            </div>


                            
                            <div class="row mb-4">
                                <?php
                                    if(isset($data[0]['staff']))
                                    {
                                        echo'<div class="col-sm-6">
                                            <h6 class="mb-3">Brokeris:</h6>
                                            <div>
                                                <strong>' . $data[0]['staff'] . '</strong>
                                            </div>
                                            <div>El. paštas:  ' . $data[0]['staff_email'] . '</div>
                                            <div>Tel. numeris: ' . $data[0]['staff_phone'] . '</div>
                                        </div>';
                                    } 
                                    if(isset($data[0]['solicitor']))
                                    {
                                        echo'<div class="col-sm-6">
                                            <h6 class="mb-3">Solicitor:</h6>
                                            <div>
                                                <strong>' . $data[0]['solicitor'] . '</strong>
                                            </div>
                                            <div>El. paštas:  ' . $data[0]['sol_email'] . '</div>
                                            <div>Tel. numeris: ' . $data[0]['sol_phone'] . '</div>
                                        </div>';
                                    }


                                ?>
                            </div>

                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="center">#</th>
                                            <th>NT Objektas</th>
                                            <th class="right">Miestas</th>
                                            <th>NT Adresas</th>
                                            <th>Aprašymas</th>
                                            <th class="right">Kaina</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="center">1</td>
                                            <td class="left strong"><?php echo $data[0]['description'];  ?></td>
                                            <td class="right">      <?php echo $data[0]['city'];  ?></td>
                                            <td class="left strong"><?php echo $data[0]['estate_adress'];  ?></td>
                                            <td class="left">       <?php echo $data[0]['contract_details'];  ?></td>
                                            <td class="right">      <?php echo $data[0]['price'] . " Eur";  ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-4 col-sm-5">
                                </div>
                                <div class="col-lg-4 col-sm-5 ml-auto">
                                    <table class="table table-clear">
                                        <tbody>
                                            <tr>
                                                <td class="left">
                                                    <strong>Pradinė kaina </strong>
                                                </td>
                                                <td class="right"> <?php echo $data[0]['price'] . " Eur";  ?></td>
                                            </tr>
                                            <tr>
                                                <td class="left">
                                                    <?php 
                                                    $perc = $data[0]['fee_percentage'] * 100;
                                                    echo "<strong>Mokesčiai " . "(" . $perc . "%)" . "</strong>";
                                                    ?>
                                                   <!-- <strong>Mokesčiai <?php echo "(" . $perc . "%)";  ?></strong> -->
                                                 
                                                </td>
                                                <td class="right"><?php echo $data[0]['fee_amount'] . " Eur";  ?></td>
                                            </tr>
                                            <tr>
                                                <td class="left">
                                                    <strong>Viso mokėti</strong>
                                                </td>
                                                <td class="right">
                                                    <?php 
                                                    $sum = $data[0]['price'] + $data[0]['fee_amount']; 
                                                    
                                                    echo "<strong>" . $sum . " Eur <strong>";  ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- <th class="radio" style="text-align: center"> <input type="radio" name=$row["id"]> </th>'; -->
                <input type="submit" value="Grįžti"><br><br>
            </form>
        </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>
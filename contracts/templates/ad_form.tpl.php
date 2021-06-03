<?
include("config.php");
//require_once SITE_ROOT . "\includes\session.php";
//session_start();
?>
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
       
            <form action="" method="POST">

                <div class="container">
                    <div class="card">
                        <div class="card-header">
                            Sutartis
                            <span class="float-right"> <strong>Būsena:</strong>
                             Kuriama
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-sm-6">
                                    <h6 class="mb-3">Pardavėjas:</h6>
                                    <div>
                                        <?php echo "<strong>" . $buyer[0]['client'] . "</strong>"?>
                                    </div>
                                    <div>El. paštas:    <?php echo $buyer[0]['email']?></div>
                                    <div>Tel. numeris:  <?php echo $buyer[0]['phone_no'] ?></div>
                                </div>
                                <div class="col-sm-6">
                                    <h6 class="mb-3">Pirkėjas:</h6>
                                    <div>
                                        <?php echo "<strong>" . $seller[0]['client'] . "</strong>"?>
                                    </div>
                                    <div>El. paštas:    <?php echo $seller[0]['email']?></div>
                                    <div>Tel. numeris:  <?php echo $seller[0]['phone_no'] ?></div>
                                </div>
                            </div>

                            <div class="table-responsive-sm">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="center">#</th>
                                            <th>NT Objektas</th>
                                            <th class="right">Miestas</th>
                                            <th>NT Adresas</th>
                                            <th class="right">Apt. mokestis %</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="center">1</td>
                                            <td class="left strong"><?php echo $data[0]['description'];  ?></td>
                                            <td class="right">      <?php echo $data[0]['city'];  ?></td>
                                            <td class="left strong"><?php echo $data[0]['estate_adress'];  ?></td>
                                            <td class="right">      <?php echo $data[0]['fee']*100 . " %";  ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-sm-5">
                                </div>
                                <div class="col-lg-4 col-sm-5 ml-auto">
                                    <table class="table table-clear">
                                        <tbody>
                                            <tr>
                                                <td class="left">
                                                    <strong>Viso mokėti</strong>
                                                </td>
                                                <td class="right"> <?php echo $data[0]['price'] . " Eur";  ?></td>
                                            </tr>
                                            <tr>
                                                <td class="left">
                                                    <?php 
                                                    echo "<strong>Mokesčiai " . "(" . $data[0]['fee']*100 . "%)" . "</strong>";
                                                    ?>
                                                </td>
                                                <td class="right"><?php echo $data[0]['fee_amount'] . " Eur";  ?></td>
                                            </tr>
                                            <tr>
                                                <td class="left">
                                                    <strong>Viso</strong>
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
                <input type="submit" name="btn_Submit" value="Submit"><br><br>
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
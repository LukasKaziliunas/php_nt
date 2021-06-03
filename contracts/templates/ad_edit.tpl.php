<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>

    <!--Ctrl+Shift+/-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <style>
        .table {
            margin-top: 1rem;
        }

        .table-hover tbody tr:hover td,
        .table-hover tbody tr:hover th {
            background-color: #ddc17b;
        }

        .container {
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        td.min,
        th.min {
            width: 1% !important;
            white-space: nowrap !important;
        }

        .table tbody>tr>td.vert-aligned {
            vertical-align: middle;
        }
    </style>
    <!--  icons etc. -->
    <link href="utils/fontawesome/css/all.css" rel="stylesheet">
    <!--load all styles -->

    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="utils/css/bootstrap.min.css" rel="stylesheet">
    <script src="utils/js/bootstrap.bundle.min.js"></script>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <title>Sutarties sąrašas</title>
</head>

<body>
    <div class="container" style="background-color: #eceeef">
        <h3>Sutarties sąrašas</h3>
    </div>

    <div class="container">

        <div class="container-fluid bg-4">
            <!-- //index.php?sub=contracts&func=edit -->
            <form action="" method="post">

            <div class="input-group mb-3">

                
                <?php
                    if($_SESSION['uid'] == 1)
                    {
                        echo '<label for="basic-url">Kontrakto detalės: </label> <br>';

                        echo '<div class="input-group mb-3">
                            <input type="text" class="form-control" name="editInput" id="basic-url" aria-describedby="basic-addon3">
                        </div>';
                    }
                    else {

                        echo '<h2>Kontrakto patvirtinimas</h2><br>';
                        echo '<div class="container" style="padding-left: 0; padding-right: 0">
                                <button type="submit" href="index.php?sub=contracts&func=list" class="btn btn-primary btn-sm">
                                    Grįžti
                                </button>
                                </div>';
                        
                    }
                ?>
            </div>

            <?php
                if($_SESSION['uid'] == 1)
                {
                    if(isset($editDetails[0]['details']))
                    {
                        echo '<h3> Esamos detalės: </h3>';
                        echo '<a>' . $editDetails[0]['details'] . '</a>';
                    }
                    else {
                        echo '<h3> Esamos detalės: </h3>';
                        echo '<a> Nėra detalių. </a>';
                    }
                }
                $_POST['contract_ID'] = $editDetails[0]['id'];
            ?>
                <?php
                    if($_SESSION['uid'] == 1)
                    {
                    echo '<br><input type="submit" name="btn_SubmitEdit" value="Submit"><br><br>';
                    }
                    else{
                        echo '<br><input type="submit" name="btn_SubmitEdit" value="Tvirtinti"><br><br>';
                    }
                ?>
            </form>

            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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
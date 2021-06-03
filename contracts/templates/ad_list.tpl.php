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
        .table-hover tbody tr:hover td, .table-hover tbody tr:hover th {
            background-color: #ddc17b;
        }
        .container {
            margin-top: 2rem;
            margin-bottom: 2rem;
        }
        td.min, th.min {
            width: 1% !important;
            white-space: nowrap !important;
        }

        .table tbody > tr > td.vert-aligned {
            vertical-align: middle;
        }
    </style>
    <!--  icons etc. -->
    <link href="utils/fontawesome/css/all.css" rel="stylesheet"> <!--load all styles -->

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

        <!--style="width: auto;"-->
        <!-- index.php?sub=contracts&func=list -->
        <form action="" method="POST">
            <div class="container" style="padding-left: 0; padding-right: 0">
                <label>Filtruoti pagal:</label><br>
                <button type="submit" name="byPrice" class="btn btn-primary btn-sm">Kainą</button>
                <button type="submit" name="byDate" class="btn btn-primary btn-sm">Datą</button>
                <button type="submit" name="bySigned" class="btn btn-primary btn-sm">Užbaigtus/signed</button>
                <button type="submit" name="Original" class="btn btn-dark btn-sm">Rodyti visus</button>
            </div>

            <table class="table table-sm table-striped table-bordered table-hover align-middle">
                <thead>
                    <tr>
                     <!-- Nr. status_active  status_approved date_signed end_date fk_ESTATE_ID -->
                        <th scope="col">Nr.</th>
                        <th scope="col">Estate adress</th>
                        <th scope="col">Contract status</th> <!-- pending or approved -->
                        <th scope="col">Staff review</th>
                        <th scope="col">Date registered</th>
                        <th scope="col">Price</th>
                        <th scope="col">Room count</th>
                        <th scope="col">Area (m^2)</th>
                        <th scope="col">Description</th>
                       <!--  <th scope="col">Empty</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //echo $errorMsg;

                    //if filtering button is pressed
                    if(isset($_POST['byPrice']))
                    {
                        $temp_id = $_SESSION['id'];
                        $temp_uid = $_SESSION['uid'];

                        $orderby = " ORDER BY price DESC";
                        $data = contract::getContracts($temp_id, $temp_uid, $orderby);
                    }
                    else if(isset($_POST['byDate']))
                    {
                        $temp_id = $_SESSION['id'];
                        $temp_uid = $_SESSION['uid'];

                        $orderby = " ORDER BY c.register_date DESC";
                        $data = contract::getContracts($temp_id, $temp_uid, $orderby);
                    }
                    else if(isset($_POST['bySigned']))
                    {

                        $temp_id = $_SESSION['id'];
                        $temp_uid = $_SESSION['uid'];

                        $orderby = " WHERE c.date_signed IS NOT NULL";
                        $data = contract::getContracts($temp_id, $temp_uid, $orderby);
                    }
                    else if(isset($_POST['Original']))
                    {
                        $temp_id = $_SESSION['id'];
                        $temp_uid = $_SESSION['uid'];
                        $data = contract::getContracts($temp_id, $temp_uid, "");
                    }
                            
                            $row_nr = 1;
                            
                            if(sizeof($data) != 0)
                            {
                                //while ($row = mysqli_fetch_array($data)) {

                                foreach($data as $row){

                                    echo "<tr>";
                                    echo "<th scope='row'>" . $row_nr . "</th>";
                                    echo "<td>" . $row['estate'] . "</td>";
                                    if($row['status_active'] == 0) {echo "<td> Inactive </td>";} else {echo "<td> Active </td>";}
                                    if($row['status_approved'] == 0) {echo "<td> Pending </td>";} else {echo "<td> Approved </td>";}
                                    if(!isset($row['register_date'])) {echo "<td> Pending </td>";} else {echo "<td>" . $row['register_date'] . "</td>";}
                                    
                                    if(!isset($row['price'])) { echo "<td> Not set </td>";} else { echo "<td> " . $row['price'] . " </td>";}

                                    //echo "<td>" . $row['price'] . "</td>";
                                    echo "<td>" . $row['room_count'] . "</td>";
                                    echo "<td>" . $row['area_m2'] . "</td>";
                                    echo "<td>" . $row['description'] . "</td>";

                                    /* Contract info  */
                                    echo '<td scope="col" class="vert-aligned" style="text-align: center"><button type="submit" name="btn_Info" value=' . $row['id'] . ' class="btn"><i class="fas fa-info-circle text-center"></i></button></td>';
                                    /* Edit contract */
                                    echo '<td scope="col" class="vert-aligned" style="text-align: center"><button type="submit" name="btn_Edit" value=' . $row['id'] . ' class="btn"><i class="fas fa-edit text-center"></i></button></td>';
                                    /* Delete contract */
                                    echo '<td scope="col" class="vert-aligned" style="text-align: center"><button type="submit" name="btn_Delete" value=' . $row['id'] . ' class="btn"><i class="fas fa-trash-alt text-center"></i></button></td>';
                                    /* Export contract */
                                    echo '<td scope="col" class="vert-aligned" style="text-align: center"><button type="submit" name="btn_Export" value=' . $row['id'] . ' class="btn"><i class="fas fa-download text-center"></i></button></td>';

                                    echo "</tr>";
                                    
                                    $row_nr++;
                                }
                            }
                    ?>
                </tbody>
            </table>
            <br><br>
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




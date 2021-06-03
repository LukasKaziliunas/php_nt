<?php
include_once 'config.php';
include_once 'sql.php';
include_once 'contracts/models/contract.php';
include_once 'contracts/models/filter.php';

$errorMsg = "";
$data = array();
$date = date('Y-m-d');

$buyer = array();
$seller = array();
$value = "";

echo "EXPORT REACHED <br>";
echo "SESSION <br>";
var_dump($_SESSION);
echo "POST <br>";
var_dump($_POST);


if(isset($_GET['submit']))
   {
    echo "SUBMIT REACHED <br>";
   }
   else
   {
    echo "ELSE REACHED <br>";


    $data = contract::selectContract($_POST['btn_Export']); 
    $filename = 'export.csv';
    //$export_data = unserialize($data);
    $export_data = $data;
    
    // file creation
    $file = fopen($filename,"w");
    
    echo "exp data: <br>";

    var_dump($export_data);


    foreach ($export_data as $line){
     fputcsv($file,$line);
    }
    
     fclose($file);
    
     // download
     header("Content-Description: File Transfer");
     header("Content-Disposition: attachment; filename=".$filename);
     header("Content-Type: application/csv; "); 
    
     readfile($filename);
    
     // deleting file
     unlink($filename);
    // exit();


    
        include 'contracts/templates/ad_list.tpl.php';
   }
?>
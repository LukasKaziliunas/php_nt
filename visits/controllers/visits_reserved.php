<!-- rezervuoti vizitai
<a href="visits/templates/visits_view_filter_delete.html">redagavimas</a><br>
<a href="visits/templates/visit_info.html">pasirinkti </a><br> -->

<?php
include_once 'config.php';
include_once 'sql.php';
include_once 'visits/models/visit.php';

$errorMsg = "";

$visits = array();
$data = array();
$dataB = array();
$dataS = array();
$dataE = array();
$dataL = array();

$dataB = visit::getBuyer();
$visits = visit::getRelatedVisitsBuyer();
$i = 0;
foreach($visits as $visit){
    $dataS[$i] = visit::getSeller($visit["fk_SELLER"]);  
    $dataE[$i] = visit::getEstate($visit["fk_ESTATE"]);
    $dataL[$i++] = visit::getLevel($visit["level"]);
}
    if (empty($visits)) {
        $errorMsg = "Rezervuotų vizitų nėra!";
    }

    //var_dump($dataE);
    //header();

include 'visits/templates/visits_reserved.php';
?>
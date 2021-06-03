<?php
ob_start();
?>
<!--brokerio meniu-->
<div id="menuContainer">

<nav class="nav nav-tabs">

        <div class="nav-item dropdown" style="margin-left: 5px">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Skelbimai</a>
            <div class="dropdown-menu">
                <a href="index.php?sub=objects&func=create" class="dropdown-item">naujas</a>   
                <a href="index.php?sub=objects&func=sell" class="dropdown-item">mano skelbimai</a>  
                <a href="index.php?sub=objects&func=selectedAds" class="dropdown-item">įsiminti skelbimai</a> 
                <a href="index.php?sub=objects&func=buy" class="dropdown-item">perkami NT objektai</a>         
                <a href="index.php?sub=objects&func=statistics" class="dropdown-item">statistika</a>
            </div>
        </div>

        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Vizitai</a>
            <div class="dropdown-menu">
                <!-- <a href="index.php?sub=visits&func=buyers_add_visit" class="dropdown-item">naujas vizitas</a> -->
                <a href="index.php?sub=visits&func=visits_reserved" class="dropdown-item">rezervuoti vizitai</a>
                <a href="index.php?sub=visits&func=visits_hosted" class="dropdown-item">aptarnaujami vizitai</a>
                <a href="index.php?sub=visits&func=visitors_view_visits_statistics" class="dropdown-item">statistika</a>

            </div>
        </div>

        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Sutartys</a>
            <div class="dropdown-menu">
                <a href="index.php?sub=contracts&func=create" class="dropdown-item">Nauja sutartis</a>
                <a href="index.php?sub=contracts&func=list" class="dropdown-item">Sutarčių sąrašas</a>
                <a href="index.php?sub=contracts&func=statistics" class="dropdown-item">Sutarčių statistika</a>
            </div>
        </div>

        <a href="index.php?sub=users&func=career" class="nav-item nav-link">Karjera</a>
        <a href="index.php?sub=users&func=staff" class="nav-item nav-link">Darbuotojai</a>
        <a href="index.php?sub=users&func=help" class="nav-item nav-link">Pagalba</a>   

</nav>
    
</div>

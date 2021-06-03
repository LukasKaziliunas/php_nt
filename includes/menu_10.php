<?php
ob_start();
?>
<!--admino meniu-->
<div id="menuContainer">

<nav class="nav nav-tabs">

        <div class="nav-item dropdown" style="margin-left: 5px">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Skelbimai</a>
            <div class="dropdown-menu">
                <a href="index.php?sub=objects&func=list" class="dropdown-item">visi skelbimai</a>
                <a href="index.php?sub=objects&func=statistics" class="dropdown-item">statistika</a>

            </div>
        </div>

        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Vizitai</a>
            <div class="dropdown-menu">
                <a href="index.php?sub=visits&func=visits_admin" class="dropdown-item">vizitu sarasas</a>
                <a href="index.php?sub=visits&func=visitors_view_visits_statistics" class="dropdown-item">vizitu statistika</a>
            </div>
        </div>

        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Sutartys</a>
            <div class="dropdown-menu">
                <a href="index.php?sub=contracts&func=list" class="dropdown-item">Sutarčių sąrašas</a>
                <a href="index.php?sub=contracts&func=statistics" class="dropdown-item">Sutarčių statistika</a>
            </div>
        </div>

        <a href="index.php?sub=users&func=accounts" class="nav-item nav-link">naudotoju paskyru valdymas</a>  
        <a href="index.php?sub=users&func=tickets_list" class="nav-item nav-link">klausimų anketos</a>
        <a href="index.php?sub=users&func=registrationStaff" class="nav-item nav-link">registruoti darbuotoją</a>

</nav>
    
</div>
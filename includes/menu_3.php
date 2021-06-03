<?php
ob_start();
?>
<!--notaro meniu-->
<div id="menuContainer">

<nav class="nav nav-tabs">

        <div class="nav-item dropdown" style="margin-left: 5px">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Skelbimai</a>
            <div class="dropdown-menu">         
                <a href="index.php?sub=objects&func=statistics" class="dropdown-item">statistika</a>
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

        <a href="index.php?sub=users&func=accounts" class="nav-item nav-link">mano paskyra</a> 
        <a href="index.php?sub=users&func=help" class="nav-item nav-link">Pagalba</a> 


</nav>
    
</div>
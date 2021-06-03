<?php
ob_start();
?>
<!--kliento meniu-->
<div id="menuContainer">

<nav class="nav nav-tabs">

        <div class="nav-item dropdown" style="margin-left: 5px">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Skelbimai</a>
            <div class="dropdown-menu">
                <a href="index.php?sub=objects&func=create" class="dropdown-item">naujas</a>  
                <a href="index.php?sub=objects&func=list" class="dropdown-item">skelbimų sąrašas</a> 
                <a href="index.php?sub=objects&func=sell" class="dropdown-item">mano skelbimai</a>  
                <a href="index.php?sub=objects&func=selectedAds" class="dropdown-item">įsiminti skelbimai</a> 
                <!--<a href="index.php?sub=objects&func=buy" class="dropdown-item">perkami NT objektai</a> -->        
                <a href="index.php?sub=objects&func=statistics" class="dropdown-item">statistika</a>
            </div>
        </div>

        
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pagalba</a>
            <div class="dropdown-menu">
                <a href="index.php?sub=users&func=newTicket" class="dropdown-item">nauja anketa</a>
                <a href="index.php?sub=users&func=myTickets" class="dropdown-item">mano anketos</a>
            </div>
        </div>  

        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">mano paskyra</a>
            <div class="dropdown-menu">
                <a href="index.php?sub=users&func=account" class="dropdown-item">redaguoti paskyrą</a>
                <a href="index.php?sub=users&func=passChange" class="dropdown-item">keisti slaptažodį</a>
            </div>
        </div>  

</nav>
    
</div>

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

     
        <a href="index.php?sub=users&func=tickets_list" class="nav-item nav-link">klausimų anketos</a>


</nav>
    
</div>
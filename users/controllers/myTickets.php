<?php

include_once 'config.php';
include_once 'sql.php';
include 'users/models/ticket.php';

$tickets = Ticket::getTickets($_SESSION['id']);

include 'users/templates/myTickets_list.tpl.php';

?>
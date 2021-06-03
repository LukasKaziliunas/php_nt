<?php

include_once 'config.php';
include_once 'sql.php';
include 'users/models/ticket.php';

$tickets = Ticket::getOpenTickets();

include 'users/templates/tickets_list.tpl.php';
   
?>
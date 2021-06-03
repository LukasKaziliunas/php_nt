<?php

include_once 'config.php';
include_once 'sql.php';
include 'users/models/ticket.php';

$result = Ticket::getOneTicket($id);

$ticketInfo = $result[0];

$messages = Ticket::getTicketMessages($id);

include 'users/templates/ticketInfo.tpl.php';

?>
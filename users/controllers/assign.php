<?php

include_once 'config.php';
include_once 'sql.php';
include 'users/models/ticket.php';

Ticket::assignTicket($id, $_SESSION['id']);

header("Location: index.php?sub=users&func=tickets_list&success=jums priskirta anketa # $id");

?>
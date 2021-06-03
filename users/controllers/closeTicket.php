<?php

include_once 'config.php';
include_once 'sql.php';
include 'users/models/ticket.php';

Ticket::closeTicket($id, $_SESSION['id']);

header("Location: index.php?sub=users&func=tickets_list&success=anketa $id uždaryta");

?>
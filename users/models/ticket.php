<?php
class Ticket {


    public function insert($data){
        $query = "INSERT INTO support_ticket (title, desciption, time, fk_CLIENT)
        VALUES ('{$data['title']}' , '{$data['description']}' , CURRENT_TIMESTAMP, {$_SESSION['id']})";

        mysql::query($query);
    }

    public function getTickets($Clientid){
        $query = "SELECT * FROM support_ticket WHERE fk_CLIENT = $Clientid";
        return mysql::select($query);
    }

    public function getOneTicket($ticketId){
        $query = "SELECT * FROM support_ticket WHERE id = $ticketId";
        return mysql::select($query);
    }

    public function getTicketMessages($ticketId){
        $query = 
        "SELECT * FROM 
        (SELECT client_answer.* , 'C' as sender, CONCAT(name , \" \" , surname) as senderName 
        FROM client_answer INNER JOIN support_ticket ON client_answer.fk_SUPPORT_TICKET = support_ticket.id 
        INNER JOIN client ON support_ticket.fk_CLIENT = CLIENT.id
        UNION 
        SELECT staff_answer.* , 'S' as sender, CONCAT(name , \" \" , surname) as senderName 
        FROM staff_answer INNER JOIN support_ticket ON staff_answer.fk_SUPPORT_TICKET = support_ticket.id 
        INNER JOIN staff ON support_ticket.fk_STAFF = staff.id) as a 
        WHERE fk_SUPPORT_TICKET = $ticketId
        ORDER BY time ASC";

        return mysql::select($query);
    }

    public function insertClientAnswer($text, $ticketId)
    {
        $query = "INSERT INTO client_answer (time, description, fk_SUPPORT_TICKET) VALUES (CURRENT_TIME, '$text', '$ticketId')";
        mysql::query($query);
    }

    public function insertStaffAnswer($text, $ticketId)
    {
        $query = "INSERT INTO staff_answer (time, description, fk_SUPPORT_TICKET) VALUES (CURRENT_TIME, '$text', '$ticketId')";
        mysql::query($query);
    }

    public function getOpenTickets(){
        $query = "SELECT support_ticket.* , name , surname FROM support_ticket 
                  LEFT JOIN staff ON support_ticket.fk_STAFF = staff.id
                  WHERE status = 1";
        return mysql::select($query);
    }

    public function assignTicket($ticketId, $staffId)
    {
        $query = "UPDATE support_ticket SET fk_STAFF = $staffId WHERE id = $ticketId";
        mysql::query($query);
    }

    public function closeTicket($ticketId)
    {
        $query = "UPDATE support_ticket SET status = 0 WHERE id = $ticketId";
        mysql::query($query);
    }
}
?>
<style>
tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<?php

echo "<table style='width:100%'>";
echo "
    <tr>
    <th>ANTRAŠTĖ</th>
    <th>ANKETOS ID</th> 
    <th>DARBUOTOJAS</th> 
    <th>DATA</th> 
    <th>ATNAUJINTI BŪSENĄ</th>
  </tr> ";
if(sizeof($tickets) == 0)
{
    echo "  
    <tr>
    <td colspan='5'>anketų nėra</td>
    </tr>";
}
foreach($tickets as $ticket)
{
    echo "
    <tr>
    <td> <a href='index.php?sub=users&func=ticketInfo&id={$ticket['id']}'> {$ticket['title']} </a> </td>
    <td>{$ticket['id']}</td>";
    if(empty($ticket['name']))
    {
        echo "<td>
                <div id='button-div' >
                <a class='btn btn-primary' href='index.php?sub=users&func=assign&id={$ticket['id']}' role='button'>Pasirinkti</a>
                </div>
                </td>";
        
    }
    else
    {
       echo "<td>{$ticket['name']} {$ticket['surname']}</td>"; 
    }
    echo "<td>{$ticket['time']}</td> 
    <td align='center' ><div id='button-div'  >
    <a class='btn btn-primary' href='index.php?sub=users&func=closeTicket&id={$ticket['id']}' role='button'>Uždaryti</a>
    </div></td>
  </tr> ";
}
echo "</table>";


?>
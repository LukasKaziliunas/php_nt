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
    <th>DATA</th> 
    <th>BŪSENA</th>
  </tr> ";
if(sizeof($tickets) == 0)
{
    echo "  
    <tr>
    <td colspan='4'>anketų nėra</td>
    </tr>";
}
foreach($tickets as $ticket)
{
    $status = ($ticket['status'] == 1) ? "atidaryta" : "uždaryta";
    echo "
    <tr>
    <td> <a href='index.php?sub=users&func=ticketInfo&id={$ticket['id']}'> {$ticket['title']} </a> </td>
    <td>{$ticket['id']}</td> 
    <td>{$ticket['time']}</td> 
    <td>$status</td>
  </tr> ";
}
echo "</table>";


?>
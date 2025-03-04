<?php
// getTickets.php

require("../../Connection/connection.php");

if(isset($_GET["id"])){
    $id = $_GET["id"];
}else{
    $id = -1;
}

$ticket = new Tickets($conn);

if($id == -1){
    $tickets = $ticket->read();
}else{
    $tickets = $ticket->read($id);
}

echo json_encode($tickets);
?>

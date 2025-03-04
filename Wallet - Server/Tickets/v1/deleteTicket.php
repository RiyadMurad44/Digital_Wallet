<?php
// deleteTicket.php

require("../../Connection/connection.php");
include("../../utils.php");

if(isset($_GET["id"])){
    $id = $_GET["id"];
}else{
    sendResponse(false, "Invalid GET Parameter");
}

$ticket = new Tickets($conn);
$result = $ticket->delete($id);

$response = $result ? sendResponse(true, "Ticket deleted!") : sendResponse(false, "Failed to delete Ticket");
echo json_encode($response);
?>

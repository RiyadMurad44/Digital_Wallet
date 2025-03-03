<?php
// addOrUpdateTicket.php

include("../../Connection/connection.php");
include("../../utils.php");

$is_new = isset($_GET["id"]) && $_GET["id"] == "add";

if(isset($_GET["id"]) && !$is_new){
    $id = $_GET["id"];
}else{
    sendResponse(false, "Invalid GET Parameter");
}

if(isset($_POST["user_id"]) && isset($_POST["user_name"]) && isset($_POST["user_email"]) && isset($_POST["title"]) && isset($_POST["description"])) {
    $user_id = $_POST["user_id"];
    $user_name = $_POST["user_name"];
    $user_email = $_POST["user_email"];
    $title = $_POST["title"];
    $description = $_POST["description"];
    $admin_id = isset($_POST["admin_id"]) ? $_POST["admin_id"] : null;
} else {
    sendResponse(false, "Missing parameters");
}

$ticket = new Tickets($conn);
if($is_new){
    $result = $ticket->create($user_id, $user_name, $user_email, $title, $description, $admin_id);
    $response = $result ? sendResponse(true, "Ticket created!") : sendResponse(false, "Failed to create Ticket");
} else {
    $result = $ticket->update($id, $title, $description, $ticket_solved, $admin_id);
    $response = $result ? sendResponse(true, "Ticket updated!") : sendResponse(false, "Failed to update Ticket");
}

echo json_encode($response);
?>

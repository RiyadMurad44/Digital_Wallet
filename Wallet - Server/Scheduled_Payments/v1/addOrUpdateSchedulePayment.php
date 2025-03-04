<?php
// addOrUpdateScheduledPayment.php

require("../../Connection/connection.php");
include("../../utils.php");

$is_new = isset($_GET["id"]) && $_GET["id"] == "add";

if(isset($_GET["id"]) && !$is_new){
    $id = $_GET["id"];
}else{
    sendResponse(false, "Invalid GET Parameter");
}

if(isset($_POST["sender_user_id"]) && isset($_POST["sender_user_name"]) && isset($_POST["receiver_user_id"]) && isset($_POST["receiver_user_name"]) && isset($_POST["transfer_amount"]) && isset($_POST["scheduling_date"]) && isset($_POST["scheduled_date"])) {
    $sender_user_id = $_POST["sender_user_id"];
    $sender_user_name = $_POST["sender_user_name"];
    $receiver_user_id = $_POST["receiver_user_id"];
    $receiver_user_name = $_POST["receiver_user_name"];
    $transfer_amount = $_POST["transfer_amount"];
    $scheduling_date = $_POST["scheduling_date"];
    $scheduled_date = $_POST["scheduled_date"];
} else {
    sendResponse(false, "Missing parameters");
}

$scheduledPayment = new Scheduled_Payments($conn);
if($is_new){
    $result = $scheduledPayment->create($sender_user_id, $sender_user_name, $receiver_user_id, $receiver_user_name, $transfer_amount, $scheduling_date, $scheduled_date);
    $response = $result ? sendResponse(true, "Scheduled Payment created!") : sendResponse(false, "Failed to create Scheduled Payment");
} else {
    $result = $scheduledPayment->update($id, $sender_user_id, $sender_user_name, $receiver_user_id, $receiver_user_name, $transfer_amount, $scheduling_date, $scheduled_date);
    $response = $result ? sendResponse(true, "Scheduled Payment updated!") : sendResponse(false, "Failed to update Scheduled Payment");
}

echo json_encode($response);
?>

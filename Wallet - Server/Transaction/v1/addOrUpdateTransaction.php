<?php
// addOrUpdateTransaction.php

require("../../Connection/connection.php");
include("../../utils.php");

$is_new = isset($_GET["id"]) && $_GET["id"] == "add";

if(isset($_GET["id"]) && !$is_new){
    $id = $_GET["id"];
}else{
    sendResponse(false, "Invalid GET Parameter");
}

if(isset($_POST["sender_user_id"]) && isset($_POST["sender_user_name"]) && isset($_POST["receiver_user_id"]) && isset($_POST["receiver_user_name"]) && isset($_POST["transfer_amount"])) {
    $sender_user_id = $_POST["sender_user_id"];
    $sender_user_name = $_POST["sender_user_name"];
    $receiver_user_id = $_POST["receiver_user_id"];
    $receiver_user_name = $_POST["receiver_user_name"];
    $transfer_amount = $_POST["transfer_amount"];
} else {
    sendResponse(false, "Missing parameters");
}

$transaction = new Transactions($conn);
if($is_new){
    $result = $transaction->create($sender_user_id, $sender_user_name, $receiver_user_id, $receiver_user_name, $transfer_amount);
    $response = $result ? sendResponse(true, "Transaction created!") : sendResponse(false, "Failed to create Transaction");
} else {
    $result = $transaction->update($id, $sender_user_id, $sender_user_name, $receiver_user_id, $receiver_user_name, $transfer_amount);
    $response = $result ? sendResponse(true, "Transaction updated!") : sendResponse(false, "Failed to update Transaction");
}

echo json_encode($response);
?>

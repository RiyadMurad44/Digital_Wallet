<?php
// addOrUpdateWallet.php

include("../../Connection/connection.php");
include("../../utils.php");

$is_new = isset($_GET["id"]) && $_GET["id"] == "add";

if(isset($_GET["id"]) && !$is_new){
    $id = $_GET["id"];
}else{
    sendResponse(false, "Invalid GET Parameter");
}

if(isset($_POST["balance"]) && isset($_POST["balance_transaction_limit"]) && isset($_POST["user_id"])) {
    $balance = $_POST["balance"];
    $balance_transaction_limit = $_POST["balance_transaction_limit"];
    $user_id = $_POST["user_id"];
} else {
    sendResponse(false, "Missing parameters");
}

$wallet = new Wallets($conn);
if($is_new){
    $result = $wallet->create($balance, $balance_transaction_limit, $user_id);
    $response = $result ? sendResponse(true, "Wallet created!") : sendResponse(false, "Failed to create Wallet");
} else {
    $result = $wallet->update($id, $balance, $balance_transaction_limit);
    $response = $result ? sendResponse(true, "Wallet updated!") : sendResponse(false, "Failed to update Wallet");
}

echo json_encode($response);
?>

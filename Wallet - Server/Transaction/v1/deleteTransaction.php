<?php
// deleteTransaction.php

include("../../Connection/connection.php");
include("../../utils.php");

if(isset($_GET["id"])){
    $id = $_GET["id"];
}else{
    sendResponse(false, "Invalid GET Parameter");
}

$transaction = new Transactions($conn);
$result = $transaction->delete($id);

$response = $result ? sendResponse(true, "Transaction deleted!") : sendResponse(false, "Failed to delete Transaction");
echo json_encode($response);
?>

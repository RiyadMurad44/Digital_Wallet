<?php
// deleteWallet.php

require("../../Connection/connection.php");
include("../../utils.php");

if(isset($_GET["id"])){
    $id = $_GET["id"];
}else{
    sendResponse(false, "Invalid GET Parameter");
}

$wallet = new Wallets($conn);
$result = $wallet->delete($id);

$response = $result ? sendResponse(true, "Wallet deleted!") : sendResponse(false, "Failed to delete Wallet");
echo json_encode($response);
?>

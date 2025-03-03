<?php
// getTransactions.php

include("../../Connection/connection.php");

if(isset($_GET["id"])){
    $id = $_GET["id"];
}else{
    $id = -1;
}

$transaction = new Transactions($conn);

if($id == -1){
    $transactions = $transaction->read();
}else{
    $transactions = $transaction->read($id);
}

echo json_encode($transactions);
?>

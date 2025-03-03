<?php
// getWallets.php

include("../../Connection/connection.php");

if(isset($_GET["id"])){
    $id = $_GET["id"];
}else{
    $id = -1;
}

$wallet = new Wallets($conn);

if($id == -1){
    $wallets = $wallet->read();
}else{
    $wallets = $wallet->read($id);
}

echo json_encode($wallets);
?>

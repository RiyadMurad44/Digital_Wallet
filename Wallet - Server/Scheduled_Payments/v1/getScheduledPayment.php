<?php
// getScheduledPayments.php

include("../../Connection/connection.php");

if(isset($_GET["id"])){
    $id = $_GET["id"];
}else{
    $id = -1;
}

$scheduledPayment = new Scheduled_Payments($conn);

if($id == -1){
    $scheduledPayments = $scheduledPayment->read();
}else{
    $scheduledPayments = $scheduledPayment->read($id);
}

echo json_encode($scheduledPayments);
?>

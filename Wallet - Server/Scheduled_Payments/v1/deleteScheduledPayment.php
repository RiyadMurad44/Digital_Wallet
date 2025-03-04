<?php
// deleteScheduledPayment.php

require("../../Connection/connection.php");
include("../../utils.php");

if(isset($_GET["id"])){
    $id = $_GET["id"];
}else{
    sendResponse(false, "Invalid GET Parameter");
}

$scheduledPayment = new Scheduled_Payments($conn);
$result = $scheduledPayment->delete($id);

$response = $result ? sendResponse(true, "Scheduled Payment deleted!") : sendResponse(false, "Failed to delete Scheduled Payment");
echo json_encode($response);
?>

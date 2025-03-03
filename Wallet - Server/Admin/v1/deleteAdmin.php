<?php
// deleteAdmin.php

include("../../Connection/connection.php");
include("../../utils.php");

if(isset($_GET["id"])){
    $id = $_GET["id"];
}else{
    sendResponse(false, "Invalid GET Parameter");
}

$admin = new Admins($conn);
$result = $admin->delete($id);

$response = $result ? sendResponse(true, "Admin deleted!") : sendResponse(false, "Failed to delete Admin");
echo json_encode($response);
?>

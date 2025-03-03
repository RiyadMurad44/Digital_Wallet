<?php
// deleteUser.php

include("../../Connection/connection.php");
include("../../utils.php");

if(isset($_GET["id"])){
    $id = $_GET["id"];
}else{
    sendResponse(false, "Invalid GET Parameter");
}

$user = new Users($conn);
$result = $user->delete($id);

$response = $result ? sendResponse(true, "User deleted!") : sendResponse(false, "Failed to delete User");
echo json_encode($response);
?>

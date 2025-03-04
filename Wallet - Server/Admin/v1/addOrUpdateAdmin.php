<?php
// addOrUpdateAdmin.php

require("../../Connection/connection.php");
include("../../utils.php");

$is_new = isset($_GET["id"]) && $_GET["id"] == "add";

if(isset($_GET["id"]) && !$is_new){
    $id = $_GET["id"];
}else{
    sendResponse(false, "Invalid GET Parameter");
}

if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["address"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $address = $_POST["address"];
} else {
    sendResponse(false, "Missing parameters");
}

$admin = new Admins($conn);
if($is_new){
    $result = $admin->create($name, $email, $password, $address);
    $response = $result ? sendResponse(true, "Admin created!") : sendResponse(false, "Failed to create Admin");
} else {
    $result = $admin->update($id, $name, $email, $password, $address);
    $response = $result ? sendResponse(true, "Admin updated!") : sendResponse(false, "Failed to update Admin");
}

echo json_encode($response);
?>

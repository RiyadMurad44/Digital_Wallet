<?php
// addOrUpdateUser.php

include("../../Connection/connection.php");
include("../../utils.php");

$is_new = isset($_GET["id"]) && $_GET["id"] == "add";

if(isset($_GET["id"]) && !$is_new){
    $id = $_GET["id"];
}else{
    sendResponse(false, "Invalid GET Parameter");
}

if(isset($_POST["name"]) && isset($_POST["address"]) && isset($_POST["nationality"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["verification_type"]) && isset($_POST["subscription_tier"]) && isset($_POST["blocked_users"])) {
    $name = $_POST["name"];
    $address = $_POST["address"];
    $nationality = $_POST["nationality"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $verification_type = $_POST["verification_type"];
    $subscription_tier = $_POST["subscription_tier"];
    $blocked_users = $_POST["blocked_users"];
} else {
    sendResponse(false, "Missing parameters");
}

$user = new Users($conn);
if($is_new){
    $result = $user->create($name, $address, $nationality, $email, $password, $verification_type, $subscription_tier, $blocked_users);
    $response = $result ? sendResponse(true, "User created!") : sendResponse(false, "Failed to create User");
} else {
    $result = $user->update($id, $name, $address, $nationality, $email, $password, $verification_type, $subscription_tier, $blocked_users);
    $response = $result ? sendResponse(true, "User updated!") : sendResponse(false, "Failed to update User");
}

echo json_encode($response);
?>

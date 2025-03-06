<?php
// getUsers.php

require("../../Connection/connection.php");
// include("../../Models/Users.php");

if(isset($_GET["id"])){
    $id = $_GET["id"];
}else{
    $id = -1;
}

$user = new Users($conn);

if($id == -1){
    $users = $user->read();
}else{
    $users = $user->read($id);
}

echo json_encode($users);
?>

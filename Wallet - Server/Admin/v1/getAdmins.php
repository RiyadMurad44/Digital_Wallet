<?php
// getAdmins.php

require("../../Connection/connection.php");

if(isset($_GET["id"])){
    $id = $_GET["id"];
}else{
    $id = -1;
}

$admin = new Admins($conn);

if($id == -1){
    $admins = $admin->read();
}else{
    $admins = $admin->read($id);
}

echo json_encode($admins);
?>

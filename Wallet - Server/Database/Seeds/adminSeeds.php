<?php
require_once '../Models/Admins.php';

$admin = new Admins();

$admins = [
    ['name' => 'Admin 1', 'email' => 'admin1@example.com', 'password' => 'password1'],
    ['name' => 'Admin 2', 'email' => 'admin2@example.com', 'password' => 'password2'],
    ['name' => 'Admin 3', 'email' => 'admin3@example.com', 'password' => 'password3'],
    ['name' => 'Admin 4', 'email' => 'admin4@example.com', 'password' => 'password4'],
    ['name' => 'Admin 5', 'email' => 'admin5@example.com', 'password' => 'password5'],
];

foreach ($admins as $adminData) {
    $admin->insert($adminData);
}

echo "Admin records inserted successfully.";
?>

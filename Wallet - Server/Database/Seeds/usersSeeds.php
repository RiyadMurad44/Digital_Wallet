<?php
require_once '../Models/Users.php';

$users = new Users();

$userData = [
    ['name' => 'User 1', 'email' => 'user1@example.com', 'password' => 'password1'],
    ['name' => 'User 2', 'email' => 'user2@example.com', 'password' => 'password2'],
    ['name' => 'User 3', 'email' => 'user3@example.com', 'password' => 'password3'],
    ['name' => 'User 4', 'email' => 'user4@example.com', 'password' => 'password4'],
    ['name' => 'User 5', 'email' => 'user5@example.com', 'password' => 'password5'],
];

foreach ($userData as $user) {
    $users->insert($user);
}

echo "User records inserted successfully.";
?>

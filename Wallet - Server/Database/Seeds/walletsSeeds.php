<?php
require_once '../Models/Wallets.php';

$wallets = new Wallets();

$walletData = [
    ['user_id' => 1, 'balance' => 1000],
    ['user_id' => 2, 'balance' => 1500],
    ['user_id' => 3, 'balance' => 2000],
    ['user_id' => 4, 'balance' => 2500],
    ['user_id' => 5, 'balance' => 3000],
];

foreach ($walletData as $wallet) {
    $wallets->insert($wallet);
}

echo "Wallet records inserted successfully.";
?>

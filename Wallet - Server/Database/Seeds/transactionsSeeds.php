<?php
require_once '../Models/Transactions.php';

$transactions = new Transactions();

$transactionData = [
    ['user_id' => 1, 'amount' => 500, 'transaction_type' => 'Credit'],
    ['user_id' => 2, 'amount' => 200, 'transaction_type' => 'Debit'],
    ['user_id' => 3, 'amount' => 300, 'transaction_type' => 'Credit'],
    ['user_id' => 4, 'amount' => 100, 'transaction_type' => 'Debit'],
    ['user_id' => 5, 'amount' => 400, 'transaction_type' => 'Credit'],
];

foreach ($transactionData as $transaction) {
    $transactions->insert($transaction);
}

echo "Transaction records inserted successfully.";
?>

<?php
require_once '../Models/Scheduled_Payments.php';

$scheduledPayments = new Scheduled_Payments();

$payments = [
    ['user_id' => 1, 'amount' => 100, 'scheduled_date' => '2025-03-10'],
    ['user_id' => 2, 'amount' => 150, 'scheduled_date' => '2025-03-15'],
    ['user_id' => 3, 'amount' => 200, 'scheduled_date' => '2025-03-20'],
    ['user_id' => 4, 'amount' => 250, 'scheduled_date' => '2025-03-25'],
    ['user_id' => 5, 'amount' => 300, 'scheduled_date' => '2025-03-30'],
];

foreach ($payments as $paymentData) {
    $scheduledPayments->insert($paymentData);
}

echo "Scheduled payment records inserted successfully.";
?>

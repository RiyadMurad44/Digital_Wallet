<?php
require_once '../Models/Tickets.php';

$tickets = new Tickets();

$ticketData = [
    ['user_id' => 1, 'issue' => 'Login issue', 'status' => 'Open'],
    ['user_id' => 2, 'issue' => 'Payment failed', 'status' => 'Resolved'],
    ['user_id' => 3, 'issue' => 'Feature request', 'status' => 'Open'],
    ['user_id' => 4, 'issue' => 'Bug report', 'status' => 'Closed'],
    ['user_id' => 5, 'issue' => 'Account suspended', 'status' => 'In Progress'],
];

foreach ($ticketData as $ticket) {
    $tickets->insert($ticket);
}

echo "Ticket records inserted successfully.";
?>

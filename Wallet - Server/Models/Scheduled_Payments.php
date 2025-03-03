<?php
// This file is for CRUD applications for all the Scheduled_Payments

require_once "../Connection/connection.php";

class Scheduled_Payments {
    private $conn;
    private $table = "Scheduled_Payments";

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create($sender_user_id, $sender_user_name, $receiver_user_id, $receiver_user_name, $transfer_amount, $scheduling_date, $scheduled_date) {
        $query = "INSERT INTO $this->table (sender_user_id, sender_user_name, receiver_user_id, receiver_user_name, transfer_amount, scheduling_date, scheduled_date) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$sender_user_id, $sender_user_name, $receiver_user_id, $receiver_user_name, $transfer_amount, $scheduling_date, $scheduled_date]);
    }

    public function read($id = null) {
        $query = "SELECT * FROM $this->table";
        if ($id) {
            $query .= " WHERE id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$id]);
            return $stmt->get_result()->fetch_assoc();
        }
        $stmt = $this->conn->query($query);
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }

    public function update($id, $sender_user_id, $sender_user_name, $receiver_user_id, $receiver_user_name, $transfer_amount, $scheduling_date, $scheduled_date) {
        $query = "UPDATE $this->table SET sender_user_id = ?, sender_user_name = ?, receiver_user_id = ?, receiver_user_name = ?, transfer_amount = ?, scheduling_date = ?, scheduled_date = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$sender_user_id, $sender_user_name, $receiver_user_id, $receiver_user_name, $transfer_amount, $scheduling_date, $scheduled_date, $id]);
    }

    public function delete($id) {
        $query = "DELETE FROM $this->table WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$id]);
    }
}
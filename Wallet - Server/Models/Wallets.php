<?php
// This file is for CRUD applications for all the Wallets

require_once "../Connection/connection.php";

class Wallets {
    private $conn;
    private $table = "Wallets";

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create($balance, $balance_transaction_limit, $user_id) {
        $query = "INSERT INTO $this->table (balance, balance_transaction_limit, user_id) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$balance, $balance_transaction_limit, $user_id]);
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

    public function update($id, $balance, $balance_transaction_limit) {
        $query = "UPDATE $this->table SET balance = ?, balance_transaction_limit = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$balance, $balance_transaction_limit, $id]);
    }

    public function delete($id) {
        $query = "DELETE FROM $this->table WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$id]);
    }
}
<?php
// This file is for CRUD applications for all the Users

require_once ("../Connection/connection.php");

class Users {
    private $conn;
    private $table = "Users";

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create($name, $address, $nationality, $email, $password) {
        $query = "INSERT INTO $this->table (name, address, nationality, email, password, verification_type, subscription_tier, blocked_users) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$name, $address, $nationality, $email, $password, NULL, 1, NULL]);
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

    public function update($id, $name, $address, $nationality, $email, $password, $verification_type, $subscription_tier, $blocked_users) {
        $query = "UPDATE $this->table SET name = ?, address = ?, nationality = ?, email = ?, password = ?, verification_type = ?, subscription_tier = ?, blocked_users = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$name, $address, $nationality, $email, $password, $verification_type, $subscription_tier, $blocked_users, $id]);
    }

    public function delete($id) {
        $query = "DELETE FROM $this->table WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$id]);
    }
}

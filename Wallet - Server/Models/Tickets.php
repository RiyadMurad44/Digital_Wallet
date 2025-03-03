<?php
// This file is for CRUD applications for all the Tickets

require_once "../Connection/connection.php";

class Tickets {
    private $conn;
    private $table = "Tickets";

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create($user_id, $user_name, $user_email, $title, $description, $admin_id = null) {
        $query = "INSERT INTO $this->table (user_id, user_name, user_email, title, description, admin_id) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$user_id, $user_name, $user_email, $title, $description, $admin_id]);
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

    public function update($id, $title, $description, $ticket_solved, $admin_id = null) {
        $query = "UPDATE $this->table SET title = ?, description = ?, ticket_solved = ?, admin_id = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$title, $description, $ticket_solved, $admin_id, $id]);
    }

    public function delete($id) {
        $query = "DELETE FROM $this->table WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$id]);
    }
}
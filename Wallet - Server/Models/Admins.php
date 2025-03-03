<?php
// require_once '../Connection/connection.php';

// class Admins {
//     public static function create($name, $email, $password, $address) {
//         global $conn;
//         $stmt = $conn->prepare("INSERT INTO Admins (name, email, password, address) VALUES (?, ?, ?, ?)");
//         $stmt->bind_param("ssss", $name, $email, $password, $address);
//         return $stmt->execute();
//     }

//     public static function read($id) {
//         global $conn;
//         $stmt = $conn->prepare("SELECT * FROM Admins WHERE id = ?");
//         $stmt->bind_param("i", $id);
//         $stmt->execute();
//         return $stmt->get_result()->fetch_assoc();
//     }

//     public static function update($id, $name, $email, $password, $address) {
//         global $conn;
//         $stmt = $conn->prepare("UPDATE Admins SET name = ?, email = ?, password = ?, address = ? WHERE id = ?");
//         $stmt->bind_param("ssssi", $name, $email, $password, $address, $id);
//         return $stmt->execute();
//     }

//     public static function delete($id) {
//         global $conn;
//         $stmt = $conn->prepare("DELETE FROM Admins WHERE id = ?");
//         $stmt->bind_param("i", $id);
//         return $stmt->execute();
//     }
// }
?>




<?php

// This file is for CRUD applications for all the Admins

require_once "../Connection/connection.php";


class Admins {
    private $conn;
    private $table = "Admins";

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create($name, $email, $password, $address) {
        $query = "INSERT INTO $this->table (name, email, password, address) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$name, $email, $password, $address]);
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

    public function update($id, $name, $email, $password, $address) {
        $query = "UPDATE $this->table SET name = ?, email = ?, password = ?, address = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$name, $email, $password, $address, $id]);
    }

    public function delete($id) {
        $query = "DELETE FROM $this->table WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$id]);
    }
}

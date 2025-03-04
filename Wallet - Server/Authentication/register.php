<?php
  require("../Connection/connection.php");
  include("../User/v1/addOrUpdateUser.php");

  if(!isset($_POST["email"]) || !isset($_POST["password"]) || !isset($_POST["Nationality"]) || !isset($_POST["Address"]) || !isset($_POST["name"])) {

    http_response_code(400);

    echo json_encode([
      "message" => "A field is missing, please put valid input"
    ]);

    exit();
  }

  $name = $_POST["name"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $nationality = $_POST["Nationality"];
  $address = $_POST["address"];


  // Validation for existing username

  $hashed = password_hash($password, PASSWORD_BCRYPT);

  try {
    $query = $conn->prepare("INSERT INTO users(email, password) values(?, ?)");
    $query->bind_param("ss", $username, $hashed);
    $query->execute();

    $query = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $query->bind_param("s", $email);
    $query->execute();

    $result = $query->get_result();

    $user = $result->fetch_assoc();

    echo json_encode([
      "user" => $user,
    ]);
  } catch (\Throwable $e) {
    http_response_code(400);

    echo json_encode([
      "message" => $e
    ]);
  }

  ?>
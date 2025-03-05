<?php
  require("../Connection/connection.php");

  // $body = json_decode(file_get_contents("php://input"), true);

  if(!isset($_POST["email"]) || !isset($_POST["password"])) {

    http_response_code(400);

    echo json_encode([
      "message" => "username and password are required"
    ]);

    exit();
  }


  $username = $_POST["email"];
  $password = $_POST["password"];

  try {
    $query = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $query->bind_param("s", $username);
    $query->execute();

    $result = $query->get_result();

    $user = $result->fetch_assoc();

    if(password_verify($password, $user["password"])) {
      echo json_encode([
        "user" => $user,
      ]);
    } else {
      http_response_code(401);

      echo json_encode([
        "message" => "Invalid credentials"
      ]);
    }
  } catch (\Throwable $e) {
    http_response_code(400);

    echo json_encode([
      "message" => $e
    ]);
  }


?>







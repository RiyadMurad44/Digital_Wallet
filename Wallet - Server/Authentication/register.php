<?php
  require("../Connection/connection.php");

  if(!isset($_POST["email"]) || !isset($_POST["password"]) || !isset($_POST["nationality"]) || !isset($_POST["address"]) || !isset($_POST["name"])) {

    http_response_code(400);

    echo json_encode([
      "message" => "A field is missing, please put valid input"
    ]);

    exit();
  }

  $name = $_POST["name"];
  $address = $_POST["address"];
  $nationality = $_POST["nationality"];
  $email = $_POST["email"];
  $password = $_POST["password"];


  // Validation for existing username

  $hashed = password_hash($password, PASSWORD_BCRYPT);

  try {

    $user = new Users($conn);

    // $query = $conn->prepare("INSERT INTO users(name, address, nationality, email, password, is_validated, verification_type, subscription_tier, created_date, blocked_users) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $query = $conn->prepare("INSERT INTO users(name, address, nationality, email, password) values(?, ?, ?, ?, ?)");
    $query->bind_param("sssss", $name, $address, $nationality, $email, $hashed);
    // $query->bind_param("sssss", $name, $address, $nationality, $email, $hashed, FALSE, NULL, 1, DATE(), NULL);
    // $query->bind_param("sssssisii", $name, $address, $nationality, $email, $hashed, FALSE, NULL, 1, DATE(), NULL);
    
    // $query = $conn->prepare("INSERT INTO users(name, address, nationality, email, password, is_validated, verification_type, subscription_tier, created_date, blocked_users) 
    // VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?)");

    // $query->bind_param("sssssisii", 
    //     $name, 
    //     $address, 
    //     $nationality, 
    //     $email, 
    //     $hashed, 
    //     0,        
    //     NULL,     
    //     1,        
    //     NULL      
    // );



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
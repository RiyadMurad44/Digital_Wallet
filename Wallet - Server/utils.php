<?php

// utils.php

function sendResponse($successResponse, $message) {
    $response = [];
    $response["success"] = $successResponse;
    $response["message"] = $message;
    echo json_encode($response);
    return;
}

?>
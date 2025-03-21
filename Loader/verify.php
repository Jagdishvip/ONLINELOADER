<?php

// Allow requests from your Android app
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// Set your valid keys here
$valid_keys = [
    "JKPAPA1",
    "USER_KEY_2",
    "USER_KEY_3"
];

// Retrieve the key securely using GET
$key = isset($_GET['key']) ? trim($_GET['key']) : '';

$response = [];

if (empty($key)) {
    $response['status'] = 'invalid';
    $response['message'] = 'No key provided.';
} elseif (in_array($key, $valid_keys)) {
    $response['status'] = 'valid';
    $response['message'] = 'Activation successful.';
} else {
    $response['status'] = 'invalid';
    $response['message'] = 'Invalid or expired activation key.';
}

// Send response
http_response_code(200);
echo json_encode($response);
exit;

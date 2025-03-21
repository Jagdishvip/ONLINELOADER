<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$key = $_GET['key'] ?? '';

$valid_keys = [
    "JK123456" => "2025-12-31",
    "VIP98765" => "2025-04-30"
];

if (isset($valid_keys[$key])) {
    $expiry_date = $valid_keys[$key];
    echo json_encode([
        "status" => "valid",
        "expiry_date" => $expiry_date
    ]);
} else {
    echo json_encode(["status" => "invalid", "expiry_date" => "1970-01-01"]);
}

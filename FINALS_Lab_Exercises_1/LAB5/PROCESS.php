<?php
header("Content-Type: application/json");

$name = $_POST["name"] ?? "Guest";

$response = [
    "status" => "success",
    "message" => "Welcome, " . $name . "!"
];

echo json_encode($response);
?>

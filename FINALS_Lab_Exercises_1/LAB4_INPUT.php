<?php
$raw = file_get_contents('php://input');
$data = json_decode($raw, true);
header('Content-Type: text/plain; charset=utf-8');

if (!$data) {
  echo "No JSON received or invalid JSON.\n";
  exit;
}

$username = $data['username'] ?? '(missing)';
$password = $data['password'] ?? '(missing)';
echo "Username: " . $username . PHP_EOL;
echo "Password: " . $password . PHP_EOL;

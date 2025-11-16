<?php
$json = '{"name":"Maria","age":21,"email":"maria@example.com"}';
$obj = json_decode($json);            // object
$arr = json_decode($json, true);     // assoc array
header('Content-Type: text/plain; charset=utf-8');
echo "Object: " . $obj->name . PHP_EOL;
echo "Array: " . $arr['email'] . PHP_EOL;

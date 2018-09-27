<?php
include "connection.php";

GetDecideMethod("POST");

// Let's get JSON input
$json_str = file_get_contents('php://input');
$json = json_decode($json_str);

$title = $json->title;

$sql = "INSERT INTO `books` (title) VALUES (?)";
$pdo->prepare($sql)->execute([$title]);

header('Content-Type: application/json');
echo "{\"result\":\"success\"}";

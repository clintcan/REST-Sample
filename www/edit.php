<?php
include "connection.php";

GetDecideMethod("PUT");

// Let's get JSON input
$json_str = file_get_contents('php://input');
$json = json_decode($json_str);

$title = $json->title;
$id = $json->id;

$sql = "UPDATE `books` SET `title` = :title WHERE id = :id";
$stmt = $pdo->prepare($sql);

$stmt->execute(["title" => $title, "id" => $id]);

header('Content-Type: application/json');
echo "{\"result\":\"success\"}";